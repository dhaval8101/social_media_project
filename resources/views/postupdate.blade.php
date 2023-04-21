<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open Form Modal</button>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="form-group">
                        <label for="titleInput">Title</label>
                        <input type="text" class="form-control" id="titleInput" name="title" >
                    </div>
                    <div class="form-group">
                        <label for="fileInput">Image</label>
                        <input type="file" class="form-control" id="fileInput" name="image">
                    </div>
                    <div class="form-group">
                        <label for="contentInput">Content</label>
                        <textarea class="form-control" id="contentInput" rows="3" name="content"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="myForm">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
// Step 3: Add an event listener to the form
$('#myForm').submit(function(event) {
    event.preventDefault();

    var title = $('#titleInput').val();
    var image = $('#fileInput').val();
    var content = $('#contentInput').val();

    $.ajax({
        url: '/submit-form',
        method: 'POST',
        data: {
            title: title,
            image: image,
            content: content
        },
        success: function(response) {
            console.log(response);
            $('#myModal').modal('hide');
            alert('Form submitted successfully!');
        },
        error: function(error) {
            console.log(error);
            alert('Error submitting form. Please try again later.');
        }
    });
});


</script>

</body>
</html>
