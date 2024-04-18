<?php
if (!isset($_SESSION['user_name'])) {
    // Optionally redirect to login or do other handling
    // header('Location: /login.php');
    // exit();
}
?>
<!DOCTYPE html>

<!-- app/Views/home.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase - Find Your Dream Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .featured-properties {
            background-color: #f8f9fa;
        }

        @media (min-width: 768px) {
            #propertyCarousel .carousel-control-prev,
            #propertyCarousel .carousel-control-next {
                width: 10%;
                background-color: rgba(94, 96, 104, 0.49);
            }

            #propertyCarousel .carousel-control-prev {
                left: -190px;
            }

            #propertyCarousel .carousel-control-next {
                right: -190px;
            }
        }

        @media (max-width: 767px) {
            #propertyCarousel .carousel-control-prev,
            #propertyCarousel .carousel-control-next {
                width: 5%;
                background-color: rgba(94, 96, 104, 0.49);
            }

            #propertyCarousel .carousel-control-prev {
                left: 20px;
            }

            #propertyCarousel .carousel-control-next {
                right: 20px;
            }
        }

        @media (min-width: 768px) {
            #testimonialCarousel .carousel-control-prev,
            #testimonialCarousel .carousel-control-next {
                width: 10%;
                background-color: rgba(94, 96, 104, 0.49);
            }

            #testimonialCarousel .carousel-control-prev {
                left: -190px;
            }

            #testimonialCarousel .carousel-control-next {
                right: -190px;
            }
        }

        @media (max-width: 767px) {
            #testimonialCarousel .carousel-control-prev,
            #testimonialCarousel .carousel-control-next {
                width: 5%;
                background-color: rgba(94, 96, 104, 0.49);
            }

            #testimonialCarousel .carousel-control-prev {
                left: 20px;
            }

            #testimonialCarousel .carousel-control-next {
                right: 20px;
            }
        }
        .hero {
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .featured-properties {
            padding-top: 10px;
            background-color: #f8f9fa;
        }
        .testimonials {
            padding-top: 10px;
        }
    </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>

<section class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4">PropertEase</h1>
                <p class="lead">Discover the perfect property.</p>
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter location or ZIP code">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="featured-properties">
    <div class="container">
        <h2 class="text-center mb-4">Featured Properties</h2>
        <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $active = 'active';
                $slideCounter = 0;
                foreach ($images as $propertyID => $data):
                    if ($slideCounter % 3 == 0) {
                        if ($slideCounter > 0) {
                            echo '</div></div>';
                        }
                        echo '<div class="carousel-item ' . $active . '"><div class="row">';
                        $active = '';
                    }
                    $address = strlen($data['address']) > 30 ? substr($data['address'], 0, 27) . '...' : $data['address'];
                    $description = strlen($data['description']) > 100 ? substr($data['description'], 0, 97) . '...' : $data['description'];
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="/images/<?= $propertyID ?>/<?= basename($data['images'][0]) ?>" alt="Property <?= $propertyID ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $address ?></h5>
                                <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= $description ?></p>
                                <a href="/propertease/public/property/<?= $propertyID ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $slideCounter++;
                    if ($slideCounter == 6) break;
                endforeach;
                echo '</div></div>';
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="container">
        <h2 class="text-center mb-4">What Our Customers Say</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial-item text-center">
                        <p>"PropertEase made my home buying experience a breeze. Highly recommended!"</p>
                        <p class="testimonial-author">- John Doe</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial-item text-center">
                        <p>"I found my dream home thanks to PropertEase. The platform is user-friendly and efficient."</p>
                        <p class="testimonial-author">- Jane Smith</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
