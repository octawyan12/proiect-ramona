<html>
    <body>

        <form action="process_product.php" method="post" enctype="multipart/form-data">
            
            <label for="name">Name</label><br>
            <input type='text' name='name' id='name'/></br>
            
            <label for="description">Description</label><br>
            <textarea name='description' id='description'></textarea></br>
            
            <label for="price">Price</label><br>
            <input type='text' name='price' id='price'/></br>
            
            <label for="file">Filename:</label><br>
            <input type="file" name="file" id="file"><br>
            
            <input type="submit" name="submit" value="Submit">
        </form>

    </body>
</html> 