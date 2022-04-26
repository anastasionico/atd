<!doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search ATD travel</title>
        <meta name="description" content="Search ATD travel products and orders">
        <meta name="author" content="Nico Anastasio">

        <meta property="og:title" content="Search ATD travel">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://www.sitepoint.com/a-basic-html5-template/">
        <meta property="og:description" content="Search ATD travel products and orders">

        <link rel="stylesheet" href="css/styles.css?v=1.0">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <main class="container p-5">
            <section class="mb-5">
                <h1>Product Search</h1>

                <form method="GET" action="/search">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="title" class="form-label">Title</label>
                        </div>

                        <div class="col-auto">
                            <input type="text" class="form-control" id="title" name="title"  aria-describedby="title">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="geo" class="form-label">Language</label>
                        </div>

                        <div class="col-auto">
                            <select name="geo">
                                <option value="en" default>English</option>
                                <option value="en-ie">Irish</option>
                                <option value="de-de">German</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="limit" class="form-label">Limit</label>
                        </div>

                        <div class="col-auto">
                            <input type="range" id="limit" name="limit"
                                   min="1" max="100" value="10">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="offset" class="form-label">Offset</label>
                        </div>

                        <div class="col-auto">
                            <input type="range" id="offset" name="offset"
                                   min="0" max="100" value="0">
                        </div>
                    </div>
                </form>
            </section>

            <section>
                <article>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Destination</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ $product->img_sml }}"/>
                                    </td>
                                    <td>
                                        <a href="api/products/{{ $product->id }}" >
                                            {{ $product->title}}
                                        </a>
                                    </td>
                                    <td>{{ $product->dest}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </section>

        </main>
        <script src="js/scripts.js"></script>
    </body>
</html>
