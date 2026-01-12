<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CrudModel;

class Crud extends BaseController
{
    public function index()
    {
        // ini_set('display_errors', 1);
        // error_reporting(E_ALL);

        // $crudModel = new CrudModel();
		// $data['user_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);
		// $data['pagination_link'] = $crudModel->pager;

        $crudModel = model(CrudModel::class);
        $data['user_data'] = $crudModel->paginate(5);
        $data['pagination_link'] = $crudModel->pager;
        return view('crud/index', $data);
    }
    
    function add()
	{
		return view('crud/add_data');
	}

    function add_validation() {
        helper(['form', 'url']);
        $error = $this->validate([
			'name'	=>	'required|min_length[3]',
			'email'	=>	'required|valid_email',
			'gender'=>	'required'
		]);
        if(!$error) {
			echo view('add_data', [
				'error' 	=> $this->validator
			]);
		} else {
			$crudModel = new CrudModel();

			$crudModel->save([
				'name'	=>	$this->request->getVar('name'),
				'email'	=>	$this->request->getVar('email'),
				'gender'=>	$this->request->getVar('gender')
			]);

			$session = \Config\Services::session();

			$session->setFlashdata('success', 'User Data Added');

			return $this->response->redirect(site_url('/crud'));
		}
    }

    function fetch_single_data($id = null)
    {
        $crudModel = new CrudModel();

        $data['user_data'] = $crudModel->where('id', $id)->first();

        return view('crud/edit_data', $data);
    }
    
    function edit_validation() {
        helper(['form', 'url']);
        $error = $this->validate([
            'name' 	=> 'required|min_length[3]',
            'email' => 'required|valid_email',
            'gender'=> 'required'
        ]);
        $crudModel = new CrudModel();

        $id = $this->request->getVar('id');

        if(!$error)
        {
        	$data['user_data'] = $crudModel->where('id', $id)->first();
        	$data['error'] = $this->validator;
        	echo view('edit_data', $data);
        } else {
	        $data = [
	            'name' => $this->request->getVar('name'),
	            'email'  => $this->request->getVar('email'),
	            'gender'  => $this->request->getVar('gender'),
	        ];

        	$crudModel->update($id, $data);

        	$session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

        	return $this->response->redirect(site_url('/crud'));
        }
    }

    function delete($id = null) {
        $crudModel = new CrudModel();

        $crudModel->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'User Data Deleted');

        return $this->response->redirect(site_url('/crud'));
    }
}
