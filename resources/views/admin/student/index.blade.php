<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sach khach thue</h5>
                <div class="ibox-tools">
                    
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>

                </div>
            </div>
            
            <div class="ibox-content">
                <div class=" tw-my-4">
                    <a href="{{route('student.createView')}}" class="btn btn-primary">Them khach thue</a>
                </div>  
                <div class="table-responsive">
                    <table id="studentTable" class="dataTables_wrapper footable table table-stripped toggle-arrow-tiny dataTables-example">
                        <thead>
                            <tr>
                                <th data-toggle="true">Ma khach</th>
                                <th>Anh</th>
                                <th>Ten khach</th>
                                <th>Nhom/ghi chu</th>
                                <th data-hide="all">Ngay sinh</th>
                                <th data-hide="all">Gioi tinh</th>
                                <th data-hide="all">CCCD</th>
                                <th data-hide="all">So dien thoai</th>
                                <th>Thao tac</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['students'] as $student) 
                                <tr>
                                    <td style="vertical-align: middle;">{{ $student->student_id }}</td> 
                                    <td style="vertical-align: middle;">
                                        <img style="width: 50px; height: 50px;" class="rounded-circle" src="{{ asset('uploads/avatars/'. $student->avatar) }}" alt="">
                                       
                                    </td> 
                                    <td style="vertical-align: middle;">{{ $student->name }}</td>
                                    <td style="vertical-align: middle;">{{ $student->class }}</td>
                                    <td style="vertical-align: middle;">{{ $student->date_of_birth }}</td> 
                                    <td style="vertical-align: middle;">{{ $student->gender }}</td> 
                                    <td style="vertical-align: middle;">{{ $student->person_id }}</td> 
                                    <td style="vertical-align: middle;">{{ $student->phone_number }}</td> 
                                   
                                    <td style="vertical-align: middle;">
                                        <a class="text-size-lg me-2" href="{{route('student.detailView', $student->student_id)}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="text-size-lg me-2" href="{{route('student.editView', $student->student_id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td> 
                                    
                                </tr>
                            @endforeach
                        </tbody>
    
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
