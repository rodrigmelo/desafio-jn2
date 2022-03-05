<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\Contracts\ICustomerService;

class CustomerController extends Controller
{
    private $service;

    public function __construct(ICustomerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $obj = $this->service->findAll();
        return response()->json($obj, Response::HTTP_OK);
    }

    public function show($id)
    {
        if (!$obj = $this->service->findById($id))
            return response()->json(['message' => 'Nenhum registro encontrado'], Response::HTTP_BAD_REQUEST);

        return response()->json(['data' => $obj, 'status' => 'success', 'message' => ''], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'cpf' => 'required|min:11',
            'cellphone' => 'required|min:11',
            'license_plate' => 'required|min:7',
        ]);

        if($validator->fails())
            return response()->json(['success' => false,'message' => $validator->errors()->all()], Response::HTTP_BAD_REQUEST);

        $obj = $this->service->add($data);
        return response()->json(['data' => $obj, 'status' => 'success', 'message' => ''], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'max:100',
            'cpf' => 'min:11',
            'cellphone' => 'min:11',
            'license_plate' => 'min:7',
        ]);

        if($validator->fails())
            return response()->json(['success' => false,'message' => $validator->errors()->all()], Response::HTTP_BAD_REQUEST);

        if(!$obj = $this->service->update($id, $request->all()))
            return response()->json(['message' => 'Nenhum registro encontrado'], Response::HTTP_BAD_REQUEST);
        return response()->json(['data' => $obj, 'status' => 'success', 'message' => ''], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        if (!$this->service->remove($id))
            return response()->json(['message' => 'Nenhum registro encontrado'], Response::HTTP_BAD_REQUEST);

		return response()->json(['data' => null, 'status' => 'success', 'message' => 'Registro removido com sucesso!'], Response::HTTP_OK);
    }

    public function endOfPlate($plate)
    {
        $obj = $this->service->endOfPlate($plate);
        return response()->json($obj, Response::HTTP_OK);
    }
}
