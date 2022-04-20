<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <nav class="container-fluid navbar navbar-light bg-black justify-content-between bg-opacity-75 px-3 w-100" >
        <h1 class="title text-white ">contact list</h1>
        <div>
          <a  class="text-white mx-2 text-decoration-none" href="profil.html">Dorso</a>
          <a class="text-white mx-2 text-decoration-none" href="contactlist.html">contacts</a>
          <a class="text-white mx-2 text-decoration-none" href="accueil.html">Logout</a>
        </div>
        
    </nav>
    <div class="container d-flex justify-content-end mt-4">
         <a href="addcontact.html"><button class="btn btn-secondary text-white shadow ">ADD NEW CONTACT</button></a>
    </div>
    <div style="overflow-x: auto">
      <table class="container-lg rounded table table-light table-striped mt-4" >

        <thead class="text-secondary">
            <tr>
              <th></th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone </th>
              <th scope="col">Adresse</th>
              <th scope="col">action</th>
              <th></th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <th scope="row"> </th>
               <td>Dorso</td>
               <td>hatim@</td>
               <td>065678</td>
               <td>Qu el amal</td>
               <td class="text-nowrap"><a href="login.html" class="bi bi-pencil text-info mx-4">Edit</a></td>
               <td class="text-nowrap"><a href="" class="bi bi-trash text-info">Delete</a></td>
             </tr>
             <tr>
               <th scope="row"> </th>
               <td>Dorso</td>
               <td>hatim@</td>
               <td>065678</td>
               <td>Qu el amal</td>
               <td class="text-nowrap"><a href="" class="bi bi-pencil text-info mx-4">Edit</a></td>
               <td class="text-nowrap"><a href="" class="bi bi-trash text-info">Delete</a></td>
             </tr>
             <tr>
               <th scope="row"> </th>
               <td>Dorso</td>
               <td>hatim@</td>
               <td>065678</td>
               <td>Qu el amal</td>
               <td class="text-nowrap"><a href="" class="bi bi-pencil text-info mx-4">Edit</a></td>
               <td class="text-nowrap"><a href="" class="bi bi-trash text-info">Delete</a></td>
             </tr>
       </tbody>

      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  
</body>
</html>