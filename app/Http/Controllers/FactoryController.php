<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FactoryFormRequest;
use App\Http\Requests\FactoryUpdateFormRequest;
use App\Models\Factory;

class FactoryController extends Controller
{

  public function index()
  {
    $factories = Factory::query()->with('employees')->latest()->paginate(10);

    return view('Factories.factories', ['data' => $factories]);
  }

  public function store(FactoryFormRequest $request)
  {
    $payload = $request->validated();

    Factory::create([
      'factory_name' => $payload['factory_name'],
      'location' => $payload['location'],
      'email' => $payload['email'],
      'website' => $payload['website'],
    ]);

    return redirect()->route('factories')->with('message', 'New factory created!');
  }

  public function update(FactoryFormRequest $request, $id)
  {
    $factory = Factory::find($id);

    $factory->factory_name = $request->factory_name;
    $factory->location = $request->location;
    $factory->email = $request->email;
    $factory->website = $request->website;
    $factory->save();

    return redirect()->route('factories')->with('message', 'Factory Updated!');
  }

  public function destroy($id)
  {
    $factory = Factory::find($id);
    $factory->delete();

    return redirect()->route('factories')->with('message', 'Factory Deleted!');
  }
}
