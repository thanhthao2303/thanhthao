<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this line to use the Log facade
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::all();

        return view('admin.bookManagement.index', compact('books'));
    }

    public function search(Request $request)
    {
        Log::info('Search query: ' . $request->input('search')); // Log search query

        $query = Book::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('tieuDe', 'like', "%{$search}%")
                  ->orWhere('tacGia', 'like', "%{$search}%")
                  ->orWhere('theLoai', 'like', "%{$search}%")
                  ->orWhere('giaBan', 'like', "%{$search}%")
                  ->orWhere('tonKho', 'like', "%{$search}%");
        }
    
        $books = $query->get();

        return response()->json(['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bookManagement.add'); // Trả về view add.blade.php
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
            'tieuDe' => 'required|string|max:255',
            'tacGia' => 'required|string|max:255',
            'nhaXuatBan' => 'required|string|max:255',
            'namXuatBan' => 'required|integer|min:1000|max:' . date('Y'),
            'ISBN' => 'required|string|unique:books,ISBN|max:13',
            'giaBan' => 'required|numeric|min:0',
            'hinhThucBia' => 'required|string|max:255',
            'tonKho' => 'required|integer|min:0',
            'soLuongDaBan' => 'required|integer|min:0',
            'nhaCungCap' => 'required|string|max:255',
            'soLuong' => 'required|integer|min:0',
            'trongLuong' => 'required|numeric|min:0',
            'soTrang' => 'required|integer|min:1',
            'nguoiDich' => 'required|string|max:255',
            'ngonNgu' => 'required|string|max:255',
            'theLoai' => 'required|string|max:255',

        ], [
            'tieuDe.required' => 'Tiêu đề không được để trống.',
            'tacGia.required' => 'Tác giả không được để trống.',
            'nhaXuatBan.required' => 'Nhà xuất bản không được để trống.',
            'namXuatBan.required' => 'Năm xuất bản không được để trống.',
            'namXuatBan.integer' => 'Năm xuất bản phải là một số nguyên.',
            'namXuatBan.min' => 'Năm xuất bản không hợp lệ.',
            'namXuatBan.max' => 'Năm xuất bản không hợp lệ.',
            'ISBN.required' => 'ISBN không được để trống.',
            'ISBN.unique' => 'ISBN đã tồn tại.',
            'giaBan.required' => 'Giá bán không được để trống.',
            'giaBan.numeric' => 'Giá bán phải là một số.',
            'giaBan.min' => 'Giá bán không hợp lệ.',
            'hinhThucBia.required' => 'Hình thức bìa không được để trống.',
            'tonKho.required' => 'Tồn kho không được để trống.',
            'tonKho.integer' => 'Tồn kho phải là một số nguyên.',
            'tonKho.min' => 'Tồn kho không hợp lệ.',
            'soLuongDaBan.required' => 'Số lượng đã bán không được để trống.',
            'soLuongDaBan.integer' => 'Số lượng đã bán phải là một số nguyên.',
            'soLuongDaBan.min' => 'Số lượng đã bán không hợp lệ.',
            'nhaCungCap.required' => 'Nhà cung cấp không được để trống.',
            'soLuong.required' => 'Số lượng không được để trống.',
            'soLuong.integer' => 'Số lượng phải là một số nguyên.',
            'soLuong.min' => 'Số lượng không hợp lệ.',
            'trongLuong.required' => 'Trọng lượng không được để trống.',
            'trongLuong.numeric' => 'Trọng lượng phải là một số.',
            'trongLuong.min' => 'Trọng lượng không hợp lệ.',
            'soTrang.required' => 'Số trang không được để trống.',
            'soTrang.integer' => 'Số trang phải là một số nguyên.',
            'soTrang.min' => 'Số trang không hợp lệ.',
            'nguoiDich.required' => 'Người dịch không được để trống.',
            'ngonNgu.required' => 'Ngôn ngữ không được để trống.',
            'theLoai.required' => 'Thể loại không được để trống.',

        ]);
 

    // Tạo nhân viên mới
     Book::create($request->all());

    // Chuyển hướng về danh sách nhân viên với thông báo thành công
    return redirect()->route('books.index')->with('success', 'Sách đã được thêm thành công.');
}

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $book = Book::find($id); // Lấy thông tin chi tiết của nhân viên theo ID
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Nhân viên không tồn tại.');
        }
        return view('admin.bookManagement.detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id); // Fetch the employee by ID
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Nhân viên không tồn tại.');
        }
        return view('admin.bookManagement.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $book = Book::find($id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Thêm thông tin nhân viên thành công');
        }
        $request->validate([
            'tieuDe' => 'required|string|max:255',
            'tacGia' => 'required|string|max:255',
            'nhaXuatBan' => 'required|string|max:255',
            'namXuatBan' => 'required|integer|min:1000|max:' . date('Y'),
            'ISBN' => 'required|string|unique:books,ISBN|max:13',
            'giaBan' => 'required|numeric|min:0',
            'hinhThucBia' => 'required|string|max:255',
            'tonKho' => 'required|integer|min:0',
            'soLuongDaBan' => 'required|integer|min:0',
            'nhaCungCap' => 'required|string|max:255',
            'soLuong' => 'required|integer|min:0',
            'trongLuong' => 'required|numeric|min:0',
            'soTrang' => 'required|integer|min:1',
            'nguoiDich' => 'required|string|max:255',
            'ngonNgu' => 'required|string|max:255',
            'theLoai' => 'required|string|max:255',

        ], [
            'tieuDe.required' => 'Tiêu đề không được để trống.',
            'tacGia.required' => 'Tác giả không được để trống.',
            'nhaXuatBan.required' => 'Nhà xuất bản không được để trống.',
            'namXuatBan.required' => 'Năm xuất bản không được để trống.',
            'namXuatBan.integer' => 'Năm xuất bản phải là một số nguyên.',
            'namXuatBan.min' => 'Năm xuất bản không hợp lệ.',
            'namXuatBan.max' => 'Năm xuất bản không hợp lệ.',
            'ISBN.required' => 'ISBN không được để trống.',
            'ISBN.unique' => 'ISBN đã tồn tại.',
            'giaBan.required' => 'Giá bán không được để trống.',
            'giaBan.numeric' => 'Giá bán phải là một số.',
            'giaBan.min' => 'Giá bán không hợp lệ.',
            'hinhThucBia.required' => 'Hình thức bìa không được để trống.',
            'tonKho.required' => 'Tồn kho không được để trống.',
            'tonKho.integer' => 'Tồn kho phải là một số nguyên.',
            'tonKho.min' => 'Tồn kho không hợp lệ.',
            'soLuongDaBan.required' => 'Số lượng đã bán không được để trống.',
            'soLuongDaBan.integer' => 'Số lượng đã bán phải là một số nguyên.',
            'soLuongDaBan.min' => 'Số lượng đã bán không hợp lệ.',
            'nhaCungCap.required' => 'Nhà cung cấp không được để trống.',
            'soLuong.required' => 'Số lượng không được để trống.',
            'soLuong.integer' => 'Số lượng phải là một số nguyên.',
            'soLuong.min' => 'Số lượng không hợp lệ.',
            'trongLuong.required' => 'Trọng lượng không được để trống.',
            'trongLuong.numeric' => 'Trọng lượng phải là một số.',
            'trongLuong.min' => 'Trọng lượng không hợp lệ.',
            'soTrang.required' => 'Số trang không được để trống.',
            'soTrang.integer' => 'Số trang phải là một số nguyên.',
            'soTrang.min' => 'Số trang không hợp lệ.',
            'nguoiDich.required' => 'Người dịch không được để trống.',
            'ngonNgu.required' => 'Ngôn ngữ không được để trống.',
            'theLoai.required' => 'Thể loại không được để trống.',

        ]);
        $book->update($request->all());
        return redirect()->route('books.index', $book->id)->with('success', 'Sửa thông tin nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Nhân viên không tồn tại.');
        }
    
        $book->delete();
    
        return redirect()->route('books.index')->with('success', 'Xóa thông tin nhân viên thành công.');
    }
}