<!DOCTYPE html>
<html>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Judul Cetak -nya YGY</title>
    <style>

        body {
            font-size: 18pt;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            font-size: 26pt;
            font-weight: bold;
        }

        h5 {
            font-size: 22pt;
            font-weight: bold;
        }

        h6 {
            font-size: 20pt;
        }

        table {
            font-size: 18pt;
        }

        th, td {
            padding: 10px !important;
        }
        .urgent {
            background-color: red;
            color: white;
            font-size: 22pt;
            width: 110px;
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;

            font-weight: bold;
            text-align: center;
        }
        .bg-merah { background-color: red; }
        .text-merah { color: red; }


        /*Table*/
        
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 18pt;
        }

        th, td {
            border: 2px solid black !important; /* Atur ketebalan border */
            padding: 10px;
        }

        /* Khusus jika masih pakai class bootstrap border-dark atau border-3 */
        .table-bordered th,
        .table-bordered td {
            border: 2px solid black !important;
        }

        /* Tambahkan ini jika border di atas/bawah hilang */
        .table-bordered thead th {
            border-top: 2px solid black !important;
            border-bottom: 2px solid black !important;
        }

        .table-bordered tfoot th,
        .table-bordered tfoot td {
            border-top: 2px solid black !important;
            border-bottom: 2px solid black !important;
        }


    </style>
</head>
<body>

    <section class="container" id="kontenPDF">
      
<!-- KONTEN ANDA DISINI  -->

      
  </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        window.onload = async function () {
            const { jsPDF } = window.jspdf;
            const el = document.getElementById("kontenPDF");

            const canvas = await html2canvas(el, { scale: 2 });
            const img = canvas.toDataURL("image/png");

            const pdf = new jsPDF('p', 'mm', 'a5');

            const marginTop = 10;
        const marginBottom = 15; // tambahkan margin bawah lebih besar
        const marginLeftRight = 10;

        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        const contentWidth = pageWidth - (marginLeftRight * 2);
        const maxContentHeight = pageHeight - marginTop - marginBottom;

        const imgProps = pdf.getImageProperties(img);
        let contentHeight = (imgProps.height * contentWidth) / imgProps.width;

        // Jika terlalu tinggi, dipotong sesuai tinggi maksimum
        if (contentHeight > maxContentHeight) {
            contentHeight = maxContentHeight;
        }

        const posX = marginLeftRight;
        const posY = marginTop;

        pdf.addImage(img, 'PNG', posX, posY, contentWidth, contentHeight);

        const blobUrl = URL.createObjectURL(pdf.output('blob'));
        window.open(blobUrl);
    };
</script>



    <!-- <script>

        window.onload = async function () {
            const { jsPDF } = window.jspdf;
            const el = document.getElementById("kontenPDF");
            const canvas = await html2canvas(el, { scale: 2 });
            const img = canvas.toDataURL("image/png");
            const pdf = new jsPDF('p', 'mm', 'a4');
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
            pdf.addImage(img, 'PNG', 0, 0, pdfWidth, pdfHeight);

    // Ganti nama file sesuai kebutuhan
    pdf.save("SPK-<?php //echo $pemesanan['kode_pemesanan']; ?>.pdf");
};
</script> -->

</body>
</html>
