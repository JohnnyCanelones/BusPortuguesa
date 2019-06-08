<?php 
use App\Occupations;
use Illuminate\Http\Request;

Route::group(['middleware' => ['auth', 'personal:true,']], function() {
    Route::get('/personal', 'StaffController@staffHome');
    
    Route::get('personal/registro', 'StaffController@showStaffForm');
    Route::post('personal/registrar', 'StaffController@staffCreate');

    Route::get('personal/show', 'StaffController@showStaff');

    Route::get('personal/show/users', 'StaffController@showUsers');

    //Modificar rol
    Route::get('personal/role/{id}', 'StaffController@showRole');
    Route::post('personal/role/update/{id}', 'StaffController@roleEdit');

    //Agregar Rol

    Route::get('personal/create/user/{id}', 'StaffController@showNewRoleForm');
    Route::post('personal/created/user/{id}', 'StaffController@newRoleCreated');

    Route::get('personal/puestos', function() {
        $occupations = Occupations::all();
        return $occupations;
    });

    Route::post('personal/puesto', function(Request $request) {
        $occupation = Occupations::create([
        	'occupation_name' => $request->get('occupation'),
        ]);
        return $occupation;
    });

    Route::get('/personal/pdf', 'StaffController@showStaffPdf')->name('staff.pdf');
    Route::get('/personal/users/pdf', 'StaffController@showUsersPdf')->name('users.pdf');

    Route::get('personal/{id}', 'StaffController@staffEditForm');
    Route::post('personal/{id}', 'StaffController@staffUpdate');

});

    Route::get('personal/me/{id}', 'StaffController@staffEditForm2');
    Route::post('personal/me/{id}', 'StaffController@staffUpdate2');


