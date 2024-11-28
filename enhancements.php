<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Applied Enhancements for the Web Application">
    <meta name="keywords" content="HTML5, tags"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>Enhancements</title>
    <link href= "styles/style.css" rel="stylesheet"/>
</head>
<body>
    <?php include 'includes/header.inc'; ?>
     
    <section class="enhancements">
        <h1>Website Enhancements</h1>

        <div class="enhancement-section">
            <article class="enhancement">
                <h2>1. Interactive Image Galleries with CSS-only Lightbox Effect</h2>
                <p>This enhancement allows users to click on a product image, which then opens a larger version of the image in a lightbox overlay. This feature enhances the user experience by providing an interactive way to view product images without navigating away from the page.</p>
                
                <h3>How it goes beyond the basic requirements of the assignment:</h3>
                <p>This enhancement goes beyond the basic requirements by implementing an interactive feature that enhances user engagement. It involves advanced CSS techniques like the <code>:target</code> pseudo-class and transitions, which are not covered in basic tutorials. This provides a more professional and user-friendly interface.</p>
                
                <h3>Code needed to implement the feature:</h3>
                <p>The feature is implemented using the following CSS:</p>
                <pre><code>
.lightbox {
    display: none;
    position: fixed;
    z-index: 999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9); /* Black background with opacity */
}

.lightbox img {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

.lightbox:target {
    display: block;
}

.lightbox .close {
    position: absolute;
    top: 20px;
    right: 45px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.lightbox .close:hover,
.lightbox .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}
                </code></pre>

                <h3>Sources:</h3>
                <p>The technique for creating a CSS-only lightbox was inspired by tutorials from various online resources. A detailed explanation of the <code>:target</code> pseudo-class used in this enhancement can be found <a href="https://css-tricks.com/almanac/selectors/t/target/">here</a>. Additionally, the concept was adapted from a similar approach found on <a href="https://www.w3schools.com/howto/howto_js_lightbox.asp">W3Schools</a>, although no JavaScript was used in this implementation.</p>

                <h3>Example:</h3>
                <p>You can see this feature implemented on the <a href="product.html">product page</a> where clicking on any product image triggers the lightbox effect.</p>
            </article>

            <article class="enhancement">
                <h2>2. Advanced CSS Grid Layout for Product Listings</h2>
                <p>This enhancement organizes product listings using a responsive CSS Grid layout. This layout system allows the product items to be displayed in an evenly spaced, aesthetically pleasing grid, which adjusts seamlessly to different screen sizes, ensuring a consistent user experience.</p>
                
                <h3>How it goes beyond the basic requirements of the assignment:</h3>
                <p>Using CSS Grid offers a more modern and flexible approach to layout design compared to older methods like floats or even flexbox. It allows for complex layouts to be created with minimal code, ensuring that the product page is both visually appealing and functionally responsive across all devices.</p>
                
                <h3>Code needed to implement the feature:</h3>
                <p>The feature is implemented using the following CSS:</p>
                <pre><code>
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.product-grid .product-item {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.product-grid .product-item:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}
                </code></pre>

                <h3>Sources:</h3>
                <p>The concept and implementation of CSS Grid were primarily guided by resources like the <a href="https://css-tricks.com/snippets/css/complete-guide-grid/">CSS Tricks Complete Guide to Grid</a> and the official <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout">Mozilla Developer Network (MDN) documentation</a>. These sources provide extensive details on how CSS Grid can be used to create responsive and flexible layouts.</p>

                <h3>Example:</h3>
                <p>You can see this feature implemented on the <a href="product.html">product page</a> where the product listings are organized using a responsive grid layout.</p>
            </article>
        </div>
    </section>

    <?php include 'includes/footer.inc'; ?>
</body>
</html>
