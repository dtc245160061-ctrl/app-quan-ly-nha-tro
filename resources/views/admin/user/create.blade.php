<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add new user </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10"><input type="email" name="email" id="email" placeholder="Email" class="form-control" required></div>
                        @if ($errors->has('email'))
                        <span class="help-block m-b-none label label-warning">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10"><input type="password" name="password" id="password" placeholder="password" class="form-control" required>
                            @if ($errors->has('password'))
                            <span class="help-block m-b-none label label-warning">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Permission</label>

                        <div class="col-sm-10">
                            <select class="form-control m-b" name="permission_id" data-placeholder="Choose a permission">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->permission_id }}">{{ $permission->permission_name }}</option>
                            @endforeach   
                            </select>
                            @if ($errors->has('permission_id'))
                            <span class="help-block m-b-none label label-warning">{{ $errors->first('permission_id') }}</span>
                            @endif
                        </div>
                    </div>
					<div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Employee</label>

                        <div class="col-sm-10">
                            <select class="form-control m-b" name="employee_id" data-placeholder="Choose a permission">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->employee_id }}-{{ $employee->name }}</option>
                            @endforeach   
                            </select>
                            @if ($errors->has('employee_id'))
                            <span class="help-block m-b-none label label-warning">{{ $errors->first('employee_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary dim btn-sm " type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>