<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>

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
</script>