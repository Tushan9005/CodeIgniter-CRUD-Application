<?php 

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController{
    public function index()
    {
        $session = \Config\Services::session();
        $data['session'] = $session;

        $model = new BookModel();
        $booksArray = $model->getRecords();
        
        $data['books'] = $booksArray;

        return view('books/list',$data);
    }

    public function create()
    {
        $session = \Config\Services::session();
        helper('form');

        $data = [];

        if($this->request->getMethod() == 'post'){
            $input = $this->validate([
                'title' => 'required|min_length[5]',
                'author' => 'required|min_length[5]',
            ]);

            if($input == true){
                //Form validated successfully
                $model = new BookModel();
                $model->save([
                    'title' => $this->request->getPost('title'),
                    'author' => $this->request->getPost('author'),
                    'isbn_no' => $this->request->getPost('isbn_no')
                ]);

                $session->setFlashdata('success','Record added successfully');

                return redirect()->to('/');
            }
            else{
                //Form not validated successfully
                $data['validation'] = $this->validator;
            }
        }
        return view('books/create',$data);
    }

    public function edit($id){
        $session = \Config\Services::session();
        helper('form');

        $model = new BookModel();
        $book = $model->getRow($id);

        if(empty($book)){
            $session->setFlashdata('error','Record not found');
            return redirect()->to('/');
        }

        $data = [];
        $data['book'] = $book;

        if($this->request->getMethod() == 'post'){
            $input = $this->validate([
                'title' => 'required|min_length[5]',
                'author' => 'required|min_length[5]',
            ]);

            if($input == true){
                //Form validated successfully
                $model = new BookModel();
                $model->update($id,[
                    'title' => $this->request->getPost('title'),
                    'author' => $this->request->getPost('author'),
                    'isbn_no' => $this->request->getPost('isbn_no')
                ]);

                $session->setFlashdata('success','Record Updated successfully');

                return redirect()->to('/');
            }
            else{
                //Form not validated successfully
                $data['validation'] = $this->validator;
            }
        }
        return view('books/edit',$data);
    }


    public function delete($id)
    {
        $session = \Config\Services::session();

        $model = new BookModel();
        $book = $model->getRow($id);

        if(empty($book)){
            $session->setFlashdata('error','Record not found');
            return redirect()->to('/');
        }

        $model = new BookModel();
        $model->delete($id);

        $session->setFlashdata('success','Record deleted successfully.');
        return redirect()->to('/');
    }

}
?>