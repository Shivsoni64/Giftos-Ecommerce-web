<!DOCTYPE html>
<html>
<head>   
    @include('home.css')

</head>

<body>

    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
    <section class="contact_section">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-md-6">
            <form action="#">
                <div>
                <input type="text" placeholder="Enter Name" />
                </div>
                <div>
                <input type="email" placeholder="Enter Email" />
                </div>
                <div>
                <input type="text" placeholder="Enter Phone" />
                </div>
                <div>
                <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                <button>
                    SEND
                </button>
                </div>
            </form>
            </div>
        </div>
    </div>

  </section>

  <br><br><br>
   
 @include('home.footer')
</body>

</html>