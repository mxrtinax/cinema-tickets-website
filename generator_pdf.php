<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PDF form</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>



      <div class="container">

          <form class="offset-md-3 col-md-6" action="/makepdf.php" method="post">
            <h1>Create your own pdf</h1>
            <p>Fill out thr details and the pdf will download</p>

              <div class="row mb-2">
                <div class="col-md-6">
                  <input type="text" name="fname" value="first name" class="form-control" required>
                </div>
                <div class="md-6">
                  <input type="text" name="lname" value="last name"class="form-control" required>
                </div>

            </div>
            <div class="mb-2">

              <input type="email" name="email" value="Email"class="form-control" required>
              <input type="tel" name="phone" value="nr"class="form-control" required>

              <textarea name="message" rows="8" cols="80"class="form-control"></textarea>

              <button class="btn btn-success btn-lg btn-block" type="submit" name="button">Create pdf</button>
            </div>



          </form>
      </div>


  </body>
</html>
