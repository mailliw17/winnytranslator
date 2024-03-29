<script src="{{asset('/js/new/jquery-3.6.0.min.js')}}">
</script>

<script src="{{asset('/js/new/core/popper.min.js')}}">
</script>

<script src="{{asset('/js/new/core/bootstrap.min.js')}}">
</script>

<script src="{{asset('/js/new/fontawesome.min.js')}}">
</script>

<script src="{{asset('/js/new/plugins/perfect-scrollbar.jquery.min.js')}}">
</script>

<script src="{{asset('/js/new/paper-dashboard.min.js?v=2.0.1')}}">
</script>

<script type="text/javascript" src="{{asset('/js/new/datatables.min.js')}}"></script>

<script src="{{asset('/js/new/sweetalert2.all.min.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script> --}}

<script>
  $(document).ready( function () {
          $('.myTable').DataTable();
      } );

    // function to count mandarin word
    // still error
      function countMandarinWords() {
        const textField = document.getElementById("ch_text");
        const wordCount = document.getElementById("wordCount");

        let text = textField.value;
        text= text.trim();
        const words = text.split(" ");
        wordCount.innerText = words.length;
      }

      // show modal when rate not yet
      $(document).ready(function(){
        $("#disabledAccount").modal('show');
        $('#disabledAccount').modal({backdrop: 'static', keyboard: false})  
      });
</script>

{{-- script to hide/unhide revision reason --}}
<script>
  function hideUnhideRevision() {
    console.log('hai 1');
      var input_revision_reason = document.getElementById("revision_reason");
      var acc = document.getElementById("accept_radio")
      var rev = document.getElementById("revision_radio")
      var status = document.getElementById("status")
  
      if(rev.checked) {
          input_revision_reason.classList.remove('d-none')
          status.value = 3 //revision
      } else {
          input_revision_reason.classList.add('d-none')
          status.value = 10 //accept
      }
  }

  function takeOutChapter() {
    console.log('hai 2');
    var input_revision_reason = document.getElementById("revision_reason");
    var take_out_chapter = document.getElementById("take_out_chapter")
    var cost_of_translate = document.getElementById("cost_of_translate")
    var status = document.getElementById("status")
    var user_id = document.getElementById("user_id")

    if(take_out_chapter.checked) {
        input_revision_reason.classList.add('d-none')
        status.value = 0 //accept
    }
  }

  function reducedFare() {
    var percentage = document.getElementById("reduced_fare").value
    var original_cost = document.getElementById("original_cost").value
    // var cost_of_translate = document.getElementById("cost_of_translate").value
    
    // if(percentage != 0) {

      var totalValue = (original_cost * ( (100-percentage) / 100 )).toFixed(2)
      document.getElementById("cost_of_translate").value = totalValue
    // } 

  }
</script>