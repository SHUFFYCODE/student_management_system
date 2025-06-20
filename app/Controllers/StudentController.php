<?php


namespace App\Controllers;


use App\Models\StudentModel;
use App\Models\GradeModel;
use App\Models\AttendanceModel;
use CodeIgniter\Controller;


class StudentController extends Controller
{
    protected $studentModel;
    protected $gradeModel;
    protected $attendanceModel;


    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->gradeModel = new GradeModel();
        $this->attendanceModel = new AttendanceModel();
    }


   public function index()
{
    $search = $this->request->getGet('search');


    if (!empty($search)) {
        $students = $this->studentModel->searchStudents($search);
    } else {
        $students = $this->studentModel->findAll();
    }


    return view('students/index', [
        'students' => $students,
        'search' => $search
    ]);
}


    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/students')->with('error', 'Access denied.');
        }


        return view('students/create');
    }


    public function store()
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/students')->with('error', 'Access denied.');
    }


    $imageFile = $this->request->getFile('image');
    $imageName = null;


    if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
        if ($imageFile->getSize() > 2 * 1024 * 1024) {
            return redirect()->back()->with('error', 'Please upload images 2MB or smaller');
        }


        $imageName = $imageFile->getRandomName();


        if (!is_dir(FCPATH . 'uploads')) {
            mkdir(FCPATH . 'uploads', 0777, true);
        }


        $imageFile->move(FCPATH . 'uploads', $imageName);
    }


    $this->studentModel->save([
        'student_id' => $this->request->getPost('student_id'),
        'name'       => $this->request->getPost('name'),
        'age'        => $this->request->getPost('age'),
        'course'     => $this->request->getPost('course'),
        'image'      => $imageName, 
    ]);


    return redirect()->to('/students')->with('success', 'Student added successfully.');
}


    public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/students')->with('error', 'Access denied.');
        }


        $imageFile = $this->request->getFile('image');
        $imageName = null;


        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            if ($imageFile->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Please put images that are 2MB or lower');
            }


            $imageName = $imageFile->getRandomName();


            if (!is_dir(FCPATH . 'uploads')) {
                mkdir(FCPATH . 'uploads', 0777, true);
            }


            $imageFile->move(FCPATH . 'uploads', $imageName);
        }


        $data = [
            'name'   => $this->request->getPost('name'),
            'age'    => $this->request->getPost('age'),
            'course' => $this->request->getPost('course'),
        ];


        if ($imageName) {
            $data['image'] = $imageName;
        }


        $this->studentModel->update($id, $data);


        return redirect()->to('/students/read/' . $id)->with('success', 'Student updated successfully.');
    }


    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/students')->with('error', 'Access denied.');
        }


        $this->studentModel->delete($id);
        return redirect()->to('/students')->with('success', 'Student deleted successfully.');
    }


    public function read($id)
    {
        $student = $this->studentModel->find($id);
        $data['student'] = $student;


        $studentIdentifier = $student['student_id'];


        $data['grades'] = $this->gradeModel->where('student_id', $studentIdentifier)->findAll();
        $data['attendance'] = $this->attendanceModel->where('student_id', $studentIdentifier)->findAll();


        return view('students/read', $data);
    }
}
