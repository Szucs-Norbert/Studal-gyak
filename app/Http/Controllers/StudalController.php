<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudalData;
use Illuminate\Support\Facades\DB;
use Validator;

class StudalController extends Controller
{
    public function myForm(Request $request){

        // if($request->isMethod("post")){
        //     $request->validate([
        //         "name"=>"required|min:4|max:20",
        //         "email"=>"required",
        //         "phone"=>"required|digits_between:9,11"
        //     ],[

        //         "name.required"=> "Rendes nevet adj meg :) "

        //     ]);
        // }

        //         return view("my_form");
        
    }

    public function addStudal(){
        return view("my_form");
    }

    public function submitStudal(Request $request){

        // $request->validated();
        $validate=Validator::make($request->all(),[


            "name"=>"required",
            "email"=>"required",
            "phone"=>"required"
        ]);

        if($validate->fails()){

                return redirect("add-studal")->withErrors($validate)->withInput();
        }

         print_r($request->all());


        
    }

    //mosciski.obie@example.net
    //Ludie Kutch

    public function listStudent(){
        $students= DB::table("students")
            //->where("id",2)->where("name", "Ludie Kutch")->get();
            //->where("id",2)->orWhere("email", "mosciski.obie@example.net")->get();
            //->whereBetween("id", [2,6])->get();

            ->select("students.name as Név",
                    "students.email as Email",
                    "courses.course as Tanfolyam",
                    "courses.price as Ár")
            ->rightjoin("courses", "students.id", "=", "courses.student_id")->get();


        echo "<pre>";
        print_r($students);
    }


    public function insertCourses(){
        DB::table("courses")->insert(
            [
            ["course"=>"Dzsango", "price"=> 220000, "student_id"=>14],
            ["course"=>"C++", "price"=> 180000, "student_id"=>23],
            ]
        );
        echo "Adatok elmentve";
    }

    public function updateCourse(){
        DB::table("courses")->where("id",7)->update([
            "course"=>"Angular",
            "price"=>"170000",
            "student_id"=>"38"
        ]);

        echo "Sikeres módosítás";
    }

    public function updateOrCourse(){
        DB::table("courses")->updateOrInsert(
            ["course"=>"C"],
            ["course"=>"C", "price"=>100000, "student_id"=>4]
        );

        echo "SIUUUUUUU vérem !!!!!!!!!!!!!!!!!!!!!!!!"; 
    }

    public function deleteCourse(){
        //DB::table("courses")->where("id",4)->delete();
        DB::table("courses")->truncate();  //--> idk-at is kitörli (1-től kezdi újra)
    } 

}
