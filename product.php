<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AZ TechMart - Explore our range of high-quality monitors">
    <meta name="keywords" content="HTML5, tags"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>AZ TechMart - Products</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <!-- Header Section -->
    <?php include 'includes/header.inc'; ?>

    <!-- Product Range Section -->
    <main class="product-range">
        <!-- Main Heading (h1) -->
        <h1>Explore Our Range of High-Quality Monitors</h1>

        <!-- Product 1 -->
        <section class="product-item">
            <a href="#img1"><img src="images/monitor_1_thumb.jpg" alt="Samsung 32' M8 4K Monitor"></a>
            <h2>Samsung 32" M8 4K Smart Monitor</h2>
            <p>The Samsung 32" M8 4K Smart Monitor M80C offers exceptional versatility and features. It comes in two sizes: 27" and 32", and is available in two elegant colors: black and white. This monitor provides a stunning 4K UHD display with vibrant colors and sharp details, making it perfect for both work and entertainment. It includes a built-in Tizen smart platform, allowing access to popular apps and streaming services without needing an additional device. The monitor also features a SlimFit Camera for video calls and USB-C connectivity with 65W power delivery.</p>
            <ul>
                <li>Resolution: 4K UHD (3840 x 2160)</li>
                <li>Panel Type: VA</li>
                <li>Brightness: 400 nits</li>
                <li>Contrast Ratio: 3000:1</li>
                <li>Refresh Rate: 60Hz</li>
                <li>Special Features: Built-in Tizen smart platform, SlimFit Camera, USB-C with 65W power delivery</li>
            </ul>
            <form>
                <label for="size1">Size:</label>
                <select id="size1" name="size">
                    <option value="32">32 inches</option>
                    <option value="27">27 inches</option>
                </select>
                <label for="color1">Color:</label>
                <select id="color1" name="color">
                    <option value="black">Black</option>
                    <option value="white">White</option>
                </select>
                <div class="product-price">
                    <span>$949</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 1 -->
        <div class="lightbox" id="img1">
            <a href="#" class="close">×</a>
            <img src="images/monitor_1_large.jpg" alt="Samsung 32' M8 4K Monitor">
        </div>

        <!-- Product 2 -->
        <section class="product-item">
            <a href="#img2"><img src="images/monitor_2_thumb.jpg" alt="LG 32SQ730S"></a>
            <h2>LG 32SQ730S</h2>
            <p>The LG 32SQ730S monitor is available in two color options: black and white. It features a 4K UHD display with excellent color accuracy and contrast, making it ideal for creative professionals and entertainment enthusiasts. The monitor includes the webOS smart platform, providing access to streaming apps and smart home integration through ThinQ. With a sleek design and advanced features, this monitor is a great addition to any modern workspace or home setup.</p>
            <ul>
                <li>Resolution: 4K UHD (3840 x 2160)</li>
                <li>Panel Type: VA</li>
                <li>Brightness: 250 nits</li>
                <li>Contrast Ratio: 3000:1</li>
                <li>Color Coverage: DCI-P3 90%</li>
                <li>Special Features: webOS, ThinQ Home Dashboard, Magic Remote, built-in apps</li>
            </ul>
            <form>
                <label for="color2">Color:</label>
                <select id="color2" name="color">
                    <option value="black">Black</option>
                    <option value="white">White</option>
                </select>
                <div class="product-price">
                    <span>$549</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 2 -->
        <div class="lightbox" id="img2">
            <a href="#" class="close">×</a>
            <img src="images/monitor_2_large.jpg" alt="LG 32SQ730S">
        </div>

        <!-- Product 3 -->
        <section class="product-item">
            <a href="#img3"><img src="images/monitor_3_thumb.jpg" alt="Samsung Odyssey G5 G50D"></a>
            <h2>Samsung Odyssey G5 G50D</h2>
            <p>The Samsung Odyssey G5 G50D is a powerful gaming monitor with a 32-inch QHD display. It features a high refresh rate of 180Hz and a fast response time of 1ms, making it perfect for competitive gaming. The monitor supports VESA DisplayHDR 400 and AMD FreeSync for smooth and immersive gameplay. It comes in a sleek black color, offering a professional and stylish look for any gaming setup.</p>
            <ul>
                <li>Resolution: QHD (2560 x 1440)</li>
                <li>Panel Type: IPS</li>
                <li>Brightness: 350 nits</li>
                <li>Contrast Ratio: 1000:1</li>
                <li>Refresh Rate: 180Hz</li>
                <li>Special Features: VESA DisplayHDR 400, AMD FreeSync, height-adjustable stand</li>
            </ul>
            <form>
                <label for="size3">Size:</label>
                <select id="size3" name="size">
                    <option value="32">32 inches</option>
                </select>
                <label for="color3">Color:</label>
                <select id="color3" name="color">
                    <option value="black">Black</option>
                </select>
                <div class="product-price">
                    <span>$497</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 3 -->
        <div class="lightbox" id="img3">
            <a href="#" class="close">×</a>
            <img src="images/monitor_3_large.png" alt="Samsung Odyssey G5 G50D">
        </div>

        <!-- Product 4 -->
        <section class="product-item">
            <a href="#img4"><img src="images/monitor_4_thumb.jpg" alt="LG 32UN880-B"></a>
            <h2>LG 32UN880-B</h2>
            <p>The LG 32UN880-B is an ergonomic monitor designed for comfort and productivity. It features a 4K UHD display with HDR10 support, delivering stunning visuals with high color accuracy. The monitor comes with an ergonomic stand that offers extensive adjustments, including height, tilt, swivel, and pivot, allowing users to customize their viewing experience. This model is available in a standard black color, making it a versatile choice for any professional environment.</p>
            <ul>
                <li>Resolution: 4K UHD (3840 x 2160)</li>
                <li>Panel Type: IPS</li>
                <li>Brightness: 350 nits</li>
                <li>Contrast Ratio: 1000:1</li>
                <li>Color Coverage: DCI-P3 95%</li>
                <li>Special Features: HDR10, ergonomic stand, USB Type-C with 60W power delivery</li>
            </ul>
            <form>
                <label for="size4">Size:</label>
                <select id="size4" name="size">
                    <option value="32">32 inches</option>
                </select>
                <label for="color4">Color:</label>
                <select id="color4" name="color">
                    <option value="black">Black</option>
                </select>
                <div class="product-price">
                    <span>$949</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 4 -->
        <div class="lightbox" id="img4">
            <a href="#" class="close">×</a>
            <img src="images/monitor_4_large.jpg" alt="Samsung Odyssey G5 G50D">
        </div>

        <!-- Product 5 -->
        <section class="product-item">
            <a href="#img5"><img src="images/monitor_5_thumb.jpg" alt="Acer Nitro XZ322Q V"></a>
            <h2>Acer Nitro XZ322Q V</h2>
            <p>The Acer Nitro XZ322Q V is a 31.5-inch Full HD gaming monitor that offers a smooth and immersive gaming experience. It features a curved VA panel with a high refresh rate of 165Hz, making it perfect for fast-paced games. The monitor supports AMD FreeSync technology, ensuring tear-free gameplay. It is available in a sleek black design, providing a modern and stylish look for any gaming setup.</p>
            <ul>
                <li>Resolution: Full HD (1920 x 1080)</li>
                <li>Panel Type: VA</li>
                <li>Brightness: 250 nits</li>
                <li>Contrast Ratio: 3000:1</li>
                <li>Refresh Rate: 165Hz</li>
                <li>Special Features: Curved display, AMD FreeSync, VESA mount compatibility</li>
            </ul>
            <form>
                <label for="size5">Size:</label>
                <select id="size5" name="size">
                    <option value="31.5">31.5 inches</option>
                </select>
                <label for="color5">Color:</label>
                <select id="color5" name="color">
                    <option value="black">Black</option>
                </select>
                <div class="product-price">
                    <span>$388</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 5 -->
        <div class="lightbox" id="img5">
            <a href="#" class="close">×</a>
            <img src="images/monitor_5_large.jpg" alt="Acer Nitro XZ322Q V">
        </div>

        <!-- Product 6 -->
        <section class="product-item">
            <a href="#img6"><img src="images/monitor_6_thumb.jpg" alt="Acer EI491CR"></a>
            <h2>Acer EI491CR</h2>
            <p>The Acer EI491CR is a 49-inch ultra-wide gaming monitor with a DFHD resolution. Its 32:9 aspect ratio provides an expansive view, ideal for multitasking and immersive gaming. The monitor features a 1800R curved VA panel, HDR10 support, and AMD FreeSync 2 technology, delivering smooth and vibrant visuals. It comes in a black finish, adding a sleek and professional touch to any setup.</p>
            <ul>
                <li>Resolution: DFHD (3840 x 1080)</li>
                <li>Panel Type: VA</li>
                <li>Brightness: 400 nits</li>
                <li>Contrast Ratio: 3000:1</li>
                <li>Refresh Rate: 120Hz</li>
                <li>Special Features: 1800R curved, AMD FreeSync 2, HDR10</li>
            </ul>
            <form>
                <label for="size6">Size:</label>
                <select id="size6" name="size">
                    <option value="49">49 inches</option>
                </select>
                <label for="color6">Color:</label>
                <select id="color6" name="color">
                    <option value="black">Black</option>
                </select>
                <div class="product-price">
                    <span>$1,239</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 6 -->
        <div class="lightbox" id="img6">
            <a href="#" class="close">×</a>
            <img src="images/monitor_6_large.jpg" alt="Acer EI491CR">
        </div>

        <!-- Product 7 -->
        <section class="product-item">
            <a href="#img7"><img src="images/monitor_7_thumb.jpg" alt="MSI 34' MAG 345CQR"></a>
            <h2>MSI 34" MAG 345CQR</h2>
            <p>The MSI 34" MAG 345CQR is a premium curved gaming monitor featuring an UWQHD resolution. With a fast 180Hz refresh rate and 1ms response time, it offers an excellent experience for competitive gamers. The monitor supports AMD FreeSync Premium, ensuring smooth and tear-free gameplay. It also features customizable RGB lighting, adding a dynamic and personalized touch to your gaming setup. This monitor is available in a standard black color.</p>
            <ul>
                <li>Resolution: UWQHD (3440 x 1440)</li>
                <li>Panel Type: VA</li>
                <li>Brightness: 400 nits</li>
                <li>Contrast Ratio: 3000:1</li>
                <li>Refresh Rate: 180Hz</li>
                <li>Special Features: Curved display, AMD FreeSync Premium, RGB lighting</li>
            </ul>
            <form>
                <label for="size7">Size:</label>
                <select id="size7" name="size">
                    <option value="34">34 inches</option>
                </select>
                <label for="color7">Color:</label>
                <select id="color7" name="color">
                    <option value="black">Black</option>
                </select>
                <div class="product-price">
                    <span>$638</span>
                </div>
                <button type="button" onclick="location.href='enquire.php'">Enquire</button>
            </form>
        </section>

        <!-- Lightbox for Monitor 7 -->
        <div class="lightbox" id="img7">
            <a href="#" class="close">×</a>
            <img src="images/monitor_7_large.jpg" alt="MSI 34' MAG 345CQR">
        </div>

        <!-- Special Offer Section -->
        <aside class="discount-offer">
            <h3>Special Offer</h3>
            <p>All products come with a 2-year warranty!</p>
        </aside>

    </main>

    <?php include 'includes/footer.inc'; ?>
    
</body>
</html>
