<html>
  <head>
    <title>404 Page</title>
    <link rel="icon" type="image/x-icon" href="./image/fabIcon.webp" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
  </head>
  <style>
@import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap');
@import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    section.notFound {
      background-color: #ff8801cc;
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
     justify-content: center;
     font-family: 'Poppins', sans-serif;
    }
    .notFoundDetails {
        text-align: center;
    text-shadow: 0px 4px 3px rgb(0 0 0 / 40%), 0px 8px 13px rgb(0 0 0 / 10%), 0px 18px 23px rgb(0 0 0 / 10%);

    }
    .notFoundDetails h2 {
    font-size: 100px;
    letter-spacing: 15px;  
    font-weight: bolder;
    color: #ff2446;

}
.notFoundDetails h3 {
    font-size: 48px;
    font-weight: bolder;
    color: #ffffff;
    letter-spacing: 2px;
}
.notFoundDetails h6 {
    color: #ffffff;
    letter-spacing: 2px;
    margin: 20px 0px;
    font-size: 16px;
}
.goToHome {
    width: 200px;
    border: none;
    padding: 8px 12px;
    background-color: #ff2446;
    color: #ffffff;
    border-radius: 8px;
    margin-top: 20px;
    font-size: 16px;
    letter-spacing: 1px;
    text-shadow: 0px 4px 3px rgb(0 0 0 / 40%), 0px 8px 13px rgb(0 0 0 / 10%), 0px 18px 23px rgb(0 0 0 / 10%);
}

.goToHome a {
    text-decoration: none;
    color: #ffffff;
}
.goToHome a:hover {
    text-decoration: none;
    color: #ffffff;
}
  </style>
  
  <body>
    <section class="notFound">
      <div class="container">
        <div class="notFoundDetails">
            <h3>Oops!</h3>
            <h2>404</h2>
            <h6>Sorry, The Page Were Looking For Does Not Exist</h6>
            <button class="goToHome"><a href="<?php echo e(route('home')); ?>">Go To Home Page</a></button>
        </div>
      </div>
    </section>
  </body>
</html>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/404.blade.php ENDPATH**/ ?>