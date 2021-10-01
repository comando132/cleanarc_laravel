<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\EmpleadosViewModel;
use MyApp\Application\UseCases\Response;
use App\ViewModels\FormularioEmpleadoViewModel;
use MyApp\Domain\Models\Employee\OfficeRepository;

use MyApp\Domain\Models\Employee\EmployeeRepository;
use MyApp\Application\UseCases\AddEmployees\AddEmployee;
use MyApp\Application\UseCases\AddEmployees\AddEmployeeRequest;
use MyApp\Application\UseCases\AddEmployees\AddEmployeeResponse;

class EmpleadosController extends Controller
{
    public function __construct(EmployeeRepository $empRepo, OfficeRepository $officeRepo) {
        $this->empRepo = $empRepo;
        $this->officeRepo = $officeRepo;
    }

    public function index() {
        $employees = $this->empRepo->list();
        $viewModel = new EmpleadosViewModel($employees);
        return view('empleados.index', $viewModel);
    }

    public function nuevo($id = null) {
        $employee = [];

        if ($id != null){
            $employee = $this->empRepo->detail($id); 
        }

        $chiefs = $this->empRepo->list();
        $offices = $this->officeRepo->list();

        $viewModel = new FormularioEmpleadoViewModel($employee, $chiefs, $offices);
        return view('empleados.nuevo', $viewModel);
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

        if($response['response'] == Response::RESPONSE_OK) {
            return redirect()->route('lista-empleados')->with('success', 'Se guardó el empleado exitosamente');
        }

        return back()->withInput()->with('error','Ocurrió un error al guardar el empleado');
    }

    public function editar(Request $request, EditEmployee $useCase){
        $editUserReq = $this->__createEditRequest($request);
        $response = $useCase($editUserReq);
        return response()->json($response);
    }

    private function __createAddRequest(Request $request) {
        $addReq = new AddEmployeeRequest();
        $addReq->setEmployeeRequest($request->all());
        return $addReq;
    }

    private function __createEditRequest(Request $request) {
        $editReq = new EditEmployeeRequest();
        $editReq->setEmployeeRequest($request->all());
        return $editReq;
    }
}
