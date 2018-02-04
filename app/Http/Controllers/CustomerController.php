<?php

namespace DDD\Http\Controllers;

use DDD\Domain\Customer;
use Illuminate\Http\Request;
use DDD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DDD\Repository\Contract\ICustomerRepository;

/**
 * Handle Customer routing
 * 
 * @category DDD\Http\Controllers
 * 
 * @author Gembit <gembit.soultan@gmail.com>
 */
class CustomerController extends Controller
{
    private $customerRepository;

    /**
     * Inject constructor injection repository
     * 
     * @param ICustomerRepository $customerRepository interface of CustomerRepository
     */
    public function __construct(ICustomerRepository $customerRepository) 
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Index customer controller
     * 
     * @return view
     */
    public function index() 
    {
        $data=array();
        $data['customers'] = $this->customerRepository->getAllCustomer();
        return view('Customer.index', $data);
    }

    public function createCustomer()
    {
        $data['customer'] = new Customer();
        return view('Customer.add', $data);
    }

    public function editCustomer($id) {
        if(!isset($id)) { return Redirect::to('/customers'); }
        $data=array();
        $data['customer'] = $this->customerRepository->getCustomerById($id);
        return view('Customer.edit', $data);
    }

    public function submitCustomer(Request $request) {
        $customer = new Customer();
        $customer->setId($request->input('id'));
        $customer->setFirstName($request->input('firstName'));
        $customer->setLastName($request->input('lastName'));
        $customer->setBirthDate($request->input('birthDate'));
        $customer->setAddress($request->input('address'));

        try {
            if($customer->getId() > 0) { $this->customerRepository->update($customer); }
            else { $this->customerRepository->insert($customer); }
            return Redirect::to('/customers');
        }catch(\Exception $ex) { 
            return $ex;
        }
        
    }
}
