<?php

namespace App\Http\Controllers;

use App\ViewModels\EmpleadosViewModel;
use Illuminate\Http\Request;
use MyApp\Application\UseCases\AddEmployees\AddEmployee;
use MyApp\Application\UseCases\AddEmployees\AddEmployeeRequest;
use MyApp\Application\UseCases\AddEmployees\AddEmployeeResponse;

use MyApp\Application\UseCases\Response;
use MyApp\Domain\Models\Employee\EmployeeRepository;

class EmpleadosController extends Controller
{
    public function __construct(EmployeeRepository $empRepo) {
        $this->empRepo = $empRepo;
        $this->response =  new Response();

    }

    public function index() {
        $employees = $this->empRepo->list();
        $viewModel = new EmpleadosViewModel($employees);
        return view('empleados.index', $viewModel);
    }

    public function detalle($id) {
        try {
            $user = $this->empRepo->detail($id);
            $this->response->setResponse(Response::RESPONSE_OK);
            $this->response->setData($user->toArray());
        } catch (\Exception $e) {
            $this->response->setResponse(Response::RESPONSE_FAIL);
            $this->response->setMessage($e->getMessage());
        } finally {
            return response()->json($this->response->getArrayResponse());
        }
    }


    public function guardar(Request $request, AddEmployee $useCase) {
        $addUserRequest = $this->__createAddRequest($request);
        $response = $useCase($addUserRequest);
        $httpResponse = ($response['response']) ? 200 : 500 ;
        return response()->json($response, $httpResponse);
    }

    private function __createAddRequest(Request $request) {
        $addReq = new AddEmployeeRequest();
        $addReq->setEmployeeRequest($request->all());
        return $addReq;
    }
}
