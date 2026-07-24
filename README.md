# My hand made CV genorator!

### I thought to myself: "Wouldn't it be cool if I could say that I make my own CV with code?" 
#### And then I did.

<hr><br>

And that is what this project is about. This uses [DomPDF](https://github.com/dompdf/dompdf) which is a PHP library that converts code to PDF's.

<br>

Document code base:
```php
<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf; // reference the Dompdf namespace


$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');

$dompdf = new Dompdf($options);

$html = '<h1>Hello PDF</h1><p>Dit is een test.</p>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('voorbeeld.pdf',[
	'Attachment' => false // true = download, false = in browser
]);
```

## How to generate the CVs

Run either PHP file from the project root. It will create a PDF file in the same folder:

```bash
php cv-english.php
php cv-dutch.php
```

The generated files will be:
- `sage-stockmans-cv-english.pdf`
- `sage-stockmans-cv-dutch.pdf`

If you need to install dependencies first, run:

```bash
composer install
```
