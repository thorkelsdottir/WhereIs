// open review pop-up!
jQuery(document).ready( function($){
  $('.open_reviews').click(function(){
    $('#allReviews').fadeIn(500);
  });
//Hér kalla ég á með Ajax pageID til að geta náð í longitude, latitude og color fyrir kortið.
  $.get("includes/function.php", { ajaxpageID:$("#nextpageID")[0].dataset.id}, function(data){
//get $myLocationArray úr cards.class.php
    data=JSON.parse(data);
    for(var i = 0; i < data.length; i++) {
//set inn hnitin fyrir hverja staðsetningu með custom marker
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data[i][0], data[i][1]),
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        icon: {
          path: MAP_PIN,
          fillColor: '#' + data[i][2],
          fillOpacity: 1,
          strokeColor: '',
          strokeWeight: 0,
          labelOrigin: new google.maps.Point(0, -26)
        },
        //útlit fyrir llabel tölu á marker
        label: {
          text: '' + ( i + 1),
          color: 'white',
          fontSize: '24px',
          //fontFamily: 'Rubik',
          fontWeight: '500'
        }
      });
    }
  });
});
//til að geta scrollað á allri síðu þannig að mapið virki en divið scrollist
var $target = $('.allInfo');
$("#googlemaps").mousewheel(function(event, delta) {
  $target.scrollTop($target.scrollTop() - (delta * 30));
  event.preventDefault();
});

$(function() {
  // Get the button that opens review pop up
  var btn = document.getElementsByClassName('open_reviews');
  // get all reviews for each card
  for (var i = 0; i < btn.length; i++) {
    btn[i].onclick = function() {
        // get cardID from database through function.php using Ajax
        $.get("includes/function.php", { cardID:this.dataset.id}, function(data){
          // close review pop-up!
          $("#allReviews").html(data);
          $('.close').click(function() {
              $('#allReviews').fadeOut(500);
          });
          // Get the write review to show and hide
          $(function() {
          var btn_review = document.getElementById("button_writeReview");
          var back_review = document.getElementById("button_backReview");
          var write_review = document.getElementById('writeReview');

          //this is to open the write reviews div
          btn_review.onclick = function() {
          	write_review.style.display = "block";
            button_writeReview.style.display = "none";
            back_review.style.display = "block";
          }
          //this is to close the write reviews div
          back_review.onclick = function() {
          		write_review.style.display = "none";
              button_writeReview.style.display = "block";
              back_review.style.display = "none";
          	}
          });
          $(function() {
              // Review Stars
             $('#stars_give').barrating({
               theme: 'fontawesome-stars',
               readonly: false,
               onSelect: function(value, text, event) {
                 if (typeof(event) !== 'undefined') {
                   // rating was selected by a user
                   console.log(event.target);

                 } else {
                   console.log("hello");
                 }
                 }
             });
             $('#stars_calc, .stars_each').barrating({
               theme: 'fontawesome-stars',
               readonly: true
             });

             // get rating for each review from database and set value
             $('.stars_each').each(function() {
              var Star_each = $(this).data('stars');
              $(this).barrating('set', Star_each);
              });

              // calculate average from all stars on each cardID
              var Star_sum = 0;
              $('.stars_each').each(function() {
               var each_review = document.getElementsByClassName('eachReview');
               var Star_each = $(this).data('stars');
               Star_sum += parseInt(Star_each);
               var Star_avg = Star_sum/each_review.length;
               $('#stars_calc').barrating('set', Star_avg);
             });
          });

        });
    }
  }
});
