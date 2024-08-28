<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FactoryFormRequest;
use App\Http\Requests\FactoryUpdateFormRequest;
use App\Models\Factory;
use App\Events\ModelEventService;

class FactoryController extends Controller
{

  public function index()
  {
    $factories = Factory::query()->with('employees')->latest()->paginate(10);

    return view('Factories.factories', ['data' => $factories]);
  }

  public function create()
  {
    return view('Factories.create-factory');
  }

  public function show(Request $request, $id)
  {
    $factory = Factory::find($id);

    return view('Factories.edit-factory', ['data' => $factory]);
  }

  public function store(Request $request)
  {
    $payload = $request->validateWithBag('create_error', [
      'action_type' => ['string'],
      'factory_name' => ['required'],
      'location' => ['required'],
      'email' => ['required', 'email:rfc,dns'],
      'website' => ['required', 'url:http,https'],
    ]);

    $factory = Factory::create([
      'factory_name' => $payload['factory_name'],
      'location' => $payload['location'],
      'email' => $payload['email'],
      'website' => $payload['website'],
    ]);

    $new_values = $factory->getOriginal();

    event(new ModelEventService(Factory::class, $factory->id, ['create' => $new_values]));

    return redirect()->route('factories')->with('message', 'New factory created!');
  }

  public function update(FactoryFormRequest $request, $id)
  {
    $factory = Factory::find($id);

    $original_values = $factory->getOriginal();

    $factory->factory_name = $request->factory_name;
    $factory->location = $request->location;
    $factory->email = $request->email;
    $factory->website = $request->website;
    $factory->save();

    $updated_values = $factory->getOriginal();

    event(new ModelEventService(Factory::class, $factory->id, ['update' => ['old_data' => $original_values, 'updated_data' => $updated_values]]));

    return redirect()->route('factories')->with('message', 'Factory Updated!');
  }

  public function destroy($id)
  {
    $factory = Factory::find($id);

    $original_values = $factory->getOriginal();

    $factory->delete();

    event(new ModelEventService(Factory::class, $factory->id, ['deleted' => $original_values]));

    return redirect()->route('factories')->with('message', 'Factory Deleted!');
  }
}
