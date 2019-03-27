symfony_compiler_pass_bug
=========================

A Symfony project created on March 27, 2019, 11:22 am.

I followed these steps :
* create the project : symfony new symfony-bug-on-compiler-pass 3.4
* create 2 examples class `AppBundle\Example\MyRootClass` and `AppBundle\Example\MySubClass`
* create 3 services in `config\services.yml`
* create a the compiler pass `AppBundle\DependencyInjection\CompilerPass\TryToOverrideSubServiceParameterPass`

If you retrieve my project you can see the bug just with a bin/console :

```
"The argument "1" doesn't exist."
"An issue occurs when we tried to replace 1 parameter in the service app.first_bugged_sub_class"
"The current arguments are : [["a first parameter","a second parameter"]]"
"Warning: array_merge(): Argument #2 is not an array"
"An issue occurs when we tried to replace $additionalParameter parameter in the service app.second_bugged_sub_class"
"The current arguments are : {"$additionalParameter":["a first parameter","a second parameter"]}"
```


