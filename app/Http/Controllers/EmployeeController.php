<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this line to use the Log facade
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index(Request $request)
    {
        $employees = Employee::all();

        return view('admin.employeeManagement.index', compact('employees'));
    }

    public function search(Request $request)
    {
        Log::info('Search query: ' . $request->input('search')); // Log search query

        $query = Employee::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('hoTen', 'like', "%{$search}%")
                  ->orWhere('diaChi', 'like', "%{$search}%")
                  ->orWhere('soDienThoai', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }
    
        $employees = $query->get();

        return response()->json(['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employeeManagement.add'); // Trả về view add.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hoTen' => 'required|regex:/^[\pL\s]+$/u',
            'ngaySinh' => 'required|date',
            'diaChi' => 'required',
            'soDienThoai' => 'required|digits:10',
            'email' => 'required|email',
            'chucVu' => 'required',
            'ngayBatDauLamViec' => 'required|date',
            'mucLuong' => 'required|numeric',
        ], [
            'hoTen.required' => 'Họ tên không được để trống.',
            'hoTen.regex' => 'Họ tên chỉ chứa chữ cái và khoảng trắng.',
            'ngaySinh.required' => 'Ngày sinh không được để trống.',
            'ngaySinh.date' => 'Ngày sinh phải là định dạng ngày hợp lệ.',
            'diaChi.required' => 'Địa chỉ không được để trống.',
            'soDienThoai.required' => 'Số điện thoại không được để trống.',
            'soDienThoai.digits' => 'Số điện thoại phải chứa đúng 10 số.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải là định dạng email hợp lệ.',
            'chucVu.required' => 'Chức vụ không được để trống.',
            'ngayBatDauLamViec.required' => 'Ngày bắt đầu làm việc không được để trống.',
            'ngayBatDauLamViec.date' => 'Ngày bắt đầu làm việc phải là định dạng ngày hợp lệ.',
            'mucLuong.required' => 'Mức lương không được để trống.',
            'mucLuong.numeric' => 'Mức lương phải là số.',
        ]);

        // Tạo nhân viên mới
        Employee::create($request->all());

        // Chuyển hướng về danh sách nhân viên với thông báo thành công
        return redirect()->route('employees.index')->with('success', 'Nhân viên đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id); // Lấy thông tin chi tiết của nhân viên theo ID
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Nhân viên không tồn tại.');
        }
        return view('admin.employeeManagement.detail', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id); // Fetch the employee by ID
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Nhân viên không tồn tại.');
        }
        return view('admin.employeeManagement.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Thêm thông tin nhân viên thành công');
        }
    
        $request->validate([
            'hoTen' => 'required|regex:/^[\pL\s]+$/u',
            'ngaySinh' => 'required|date',
            'diaChi' => 'required',
            'soDienThoai' => 'required|digits:10',
            'email' => 'required|email',
            'chucVu' => 'required',
            'ngayBatDauLamViec' => 'required|date',
            'mucLuong' => 'required|numeric',
        ], [
            'hoTen.required' => 'Họ tên không được để trống.',
            'hoTen.regex' => 'Họ tên chỉ chứa chữ cái và khoảng trắng.',
            'ngaySinh.required' => 'Ngày sinh không được để trống.',
            'ngaySinh.date' => 'Ngày sinh phải là định dạng ngày hợp lệ.',
            'diaChi.required' => 'Địa chỉ không được để trống.',
            'soDienThoai.required' => 'Số điện thoại không được để trống.',
            'soDienThoai.digits' => 'Số điện thoại phải chứa đúng 10 số.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải là định dạng email hợp lệ.',
            'chucVu.required' => 'Chức vụ không được để trống.',
            'ngayBatDauLamViec.required' => 'Ngày bắt đầu làm việc không được để trống.',
            'ngayBatDauLamViec.date' => 'Ngày bắt đầu làm việc phải là định dạng ngày hợp lệ.',
            'mucLuong.required' => 'Mức lương không được để trống.',
            'mucLuong.numeric' => 'Mức lương phải là số.',
        ]);

    
        $employee->update($request->all());
        return redirect()->route('employees.edit', $employee->id)->with('success', 'Sửa thông tin nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Nhân viên không tồn tại.');
        }
    
        $employee->delete();
    
        return redirect()->route('employees.index')->with('success', 'Xóa thông tin nhân viên thành công.');
    }
}