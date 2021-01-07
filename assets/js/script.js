function previewImage(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('image');
        output.removeAttribute('hidden');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}