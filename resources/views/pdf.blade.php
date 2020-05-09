<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers tr th  b{
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }
        </style>
  </head>
  <body>
    <table id="customers">
    <thead>
      <tr>
        <td><b>Montant de base </b></td>
        <td><b>Total des dépenses</b></td>
        <td><b>Total des gains</b></td>
        <td><b>Montant actuel</b></td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
        @foreach($totals as $total)
            {{$total}}€
        @endforeach
        </td>
        <td>
            {{$totDepense}}€
        </td>
        <td>
            {{$totGain}}€
        </td>
        <td>
            {{$tot}}€
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>
