open Js_of_ocaml;;

(* This program defines a function called oneArgument which adds 100 to an integer
   -> Access the console after running the html file on a browser
   -> User should be able to run the function: jsOneArgument(*pass in integer*)
      This should run the oneArgument function *)
let () =
    let oneArgument (a: int) = a + 100 in
    Js.Unsafe.global##.jsOneArgument := Js.wrap_callback oneArgument;
    (* This will go to console.log *)
    print_string "Hello from Js_of_ocaml!\n";




(* 1.) ocamlfind ocamlc -g -o main.byte -linkpkg -package js_of_ocaml,js_of_ocaml-ppx main.ml *)
(* NOTE: make sure there are no spaces after the "," when listing the packages *)

(* 2.) js_of_ocaml -g -o main.js main.byte *)
