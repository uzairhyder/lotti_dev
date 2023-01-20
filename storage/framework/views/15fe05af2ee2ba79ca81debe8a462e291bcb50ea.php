<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->

<title>Lotti Website | <?php echo $__env->yieldContent('title'); ?></title>
<?php echo $__env->make('frontend.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Head -->

<body onload="reset_filters()">

  <!-- Start Navbar -->

  <?php echo $__env->make('frontend.common.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- End Navbar -->

  <!-- Start Sidebar -->

  <?php echo $__env->make('frontend.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

  <?php echo $__env->make('frontend.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <!-- End Footer -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
  <script>
    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type','info')); ?>"
    switch(type){
       case 'info':
       toastr.info(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'success':
       toastr.success(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'warning':
       toastr.warning(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'error':
       toastr.error(" <?php echo e(Session::get('message')); ?> ");
       break;
    }
    <?php endif; ?>

    </script>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            toastr.error('<?php echo e($error); ?>');
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

  <?php if(session()->has('empty_cart')): ?>
    <script>toastr.error('<?php echo e(session()->get('empty_cart')); ?>')</script>
  <?php endif; ?>
  <?php if(session()->has('stripe_payment')): ?>
    <script>toastr.success('<?php echo e(session()->get('stripe_payment')); ?>')</script>
  <?php endif; ?>



<script>
    function reset_filters() {

localStorage.removeItem("product_sub_category");
localStorage.removeItem("in_stock");
localStorage.removeItem("start_range");
localStorage.removeItem("end_range");
localStorage.removeItem("rating_star");

}
</script>
  
  <script>
    // autocomplete search
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    var countries = <?php echo e(Illuminate\Support\Js::from(search())); ?>;
    var countries2 = countries.filter((x, i, a) => a.indexOf(x) === i);
    // console.log(typeof(countries2));
    // console.log(countries2);


    /*initiate the autocomplete function on the "theme_topic" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("search_product"), countries2);
    // autocomplete search
</script>
</body>
</html>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/layout.blade.php ENDPATH**/ ?>