<?php
use App\Models\MainStructure\SysListModules;
use App\Models\MainStructure\SysFunctionOfControllers;
//Module
Route::group(['prefix' => 'module'], function(){
    Route::get('', 'MainStructure\Users\UsersModuleController@listModule')->name('user.get.list.module');
    try {
        $pages = SysListModules::whereActive('1')->get();
        foreach ($pages as $page) {

            if (!empty($page->path_controller)) {
                $functions = SysFunctionOfControllers::where('id_module','=',$page->id)->get();

                foreach ($functions as $key=>$function) {
                    if($function->method == '1'){
                        Route::get('/' . $page->slug, $page->path_controller.'@'.$function->function)->name($page->controller.'.get.'.$function->function);
                    } else {
                        Route::post('/' . $page->slug . $key, $page->path_controller.'@'.$function->function)->name($page->controller.'.post.'.$function->function);
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo '*************************************' . PHP_EOL;
        echo 'Error fetching database pages: ' . PHP_EOL;
        echo $e->getMessage() . PHP_EOL;
        echo '*************************************' . PHP_EOL;
    }
});
?>