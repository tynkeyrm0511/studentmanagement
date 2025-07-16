# Student Management System

Một hệ thống quản lý sinh viên đơn giản được xây dựng bằng Laravel 12, TailwindCSS. Dự án hỗ trợ quản trị viên dễ dàng theo dõi và cập nhật thông tin sinh viên, lớp học, môn học và điểm số.

## Công nghệ sử dụng

- **PHP** (Laravel 12, Laravel Breeze)
- **TailwindCSS**
- **HTML/CSS**
- **MySQL**
## Một số hình ảnh
### Login
![Login](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(9).png)
### Dashboard
![Dashboard](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(2).png)
### Students
![Manage Students](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(3).png)
### Classes
![Manage Classes](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(4).png)
### Subjects
![Manage Subjects](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(5).png)
### Grades
![Manage Grades 1](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(6).png)
![Manage Grades 2](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(7).png)
### Profile
![Manage Profile](https://raw.githubusercontent.com/tynkeyrm0511/studentmanagement/refs/heads/main/Screenshots/Screenshot%20(8).png)
## Chức năng chính

### Xác thực

- Đăng nhập, đăng xuất dành cho admin
- Quản lý thông tin tài khoản (Laravel Breeze)

### Quản lý sinh viên

- Thêm, sửa, xoá sinh viên
- Tìm kiếm theo tên hoặc mã sinh viên
- Phân trang danh sách sinh viên

### Quản lý lớp học

- CRUD lớp học
- Tìm kiếm, phân trang danh sách lớp

### Quản lý môn học

- CRUD môn học
- Tìm kiếm, phân trang danh sách môn

### Quản lý điểm số

- Chọn lớp & môn để nhập điểm
- Nhập điểm hàng loạt cho sinh viên trong lớp

### Dashboard

- Thống kê tổng số sinh viên, lớp học, môn học
- Hiển thị bằng UI đẹp với TailwindCSS

## Cài đặt và chạy dự án
### 1. Clone repo
git clone https://github.com/tynkeyrm0511/studentmanagement.git
cd student-management
### 2. Cài đặt package
composer install
npm install && npm run dev
### 3. Cấu hình .env
cp .env.example .env
php artisan key:generate
### 4. Tạo database và chạy migrate
php artisan migrate --seed
### 5. Khởi động project
composer run dev
### 6. Đăng nhập admin (tài khoản mặc định)
Email: admin@email.com
Password: password





