<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Vanilla</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./img/clogo.png"  type="image/x-icon">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Navigation Bar -->
    <div class="navv sticky-top">
        <?php require 'navbar.php' ?>
    </div>

    <!-- About Us Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">About Us</h1>
                <p>
                    <strong>About Vanilla Online Clothing Store</strong>
                    Welcome to Vanilla, your ultimate destination for trendy and fashionable clothing. We are not just another online clothing store; we are a lifestyle brand that believes in bringing you the latest fashion with a touch of elegance. Our passion for style, quality, and exceptional customer service sets us apart.
                </p>
                <p>
                    <strong>Unveil Your Unique Style</strong>
                At Vanilla, we understand that your clothing choices are an expression of your individuality. That's why we offer a diverse range of clothing, from casual wear to formal attire, all curated to help you unveil your unique style. Explore our collections and find the perfect outfit for every occasion.
                </p>
                <p>
                <strong>Your Style, Your Story! </strong>
                At Vanilla, we believe that clothing is more than just fabric; it's a canvas for self-expression. Whether you're looking for a wardrobe refresh, an outfit for a special event, or simply want to elevate your daily style, Vanilla has you covered. Your style is your story, and we're here to help you tell it.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require 'footer.php'; ?>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>