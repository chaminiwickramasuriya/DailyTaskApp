<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>task</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="text-center">
                <h1>Daily Task App</h1>
<br>
                <div class="raw">
                    <div class="col-md-12">

                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach    

                        <form method="POST" action="/saveTask" >
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="task" placeholder="Enter Your Tasks Here">
                        <br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                        </form><br>
                        <table class="table table-dark">
                            <th>ID</th>
                            <th>Task</th>
                            <th>Is Completed</th>
                            <th>Action</th>
                            @foreach($tasks as $task)
                            <tr>
                              <td>{{$task->id}}</td>
                              <td>{{$task->tasks}}</td>
                              <td>
                                  @if($task->isCompleted)
                                    <button class="btn btn-success">Completed</button>
                                   @else
                                     <button class="btn btn-warning">Not Completed</button>
                                   @endif   
                              </td>
                              <td>
                                  @if(!$task->isCompleted)
                                  <a href="/markAsCompleted/{{$task->id}}" class="btn  btn-primary">Mark as Completed</a>
                                  @else
                                  <a href="/markAsNotCompleted/{{$task->id}}" class="btn  btn-danger">Mark as Not Completed</a>
                                  @endif
                                  <a href="/deleteTask/{{$task->id}}" class="btn btn-default">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>