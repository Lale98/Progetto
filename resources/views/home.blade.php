<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>

        
    </head>
    <body>
        <div>
            <?php 
                // require_once 'C:\Users\Ale\Desktop\Progetto\vendor\autoload.php'; 

                // $api = new CloudTables\Api('wxkbs9mtc1', 'XLweKpWq5m6tg3EIqJugnPmU', [
                //     //clientId => 'Unique client id', // Client id (e.g. a login id) - optional
                //     //clientName => 'Name'            // Client's name - optional
                // ]);

                // $script = $api->scriptTag('6d015866-186d-11ec-91c3-4bbe4f66f585');
            ?>
            
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Dicembre 2020</th>
                        <th>01 Mar</th>
                        <th>02 Mer</th>
                        <th>03 Gio</th>
                        <th>04 Ven</th>
                        <th>TOT</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{Str::substr($timbrata['dataora'], 11, 5)}}  ora --}}
                    @foreach ($dipendenti as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td> 
                                @foreach ($timbrate as $timbrata)
                                    @if ($item['id'] == $timbrata['employee_id'] && substr($timbrata['dataora'], 0, 10) == '2020-12-01')

                                        @if ($timbrata['verso'] == 'E')
                                            {{ $entrata = substr($timbrata['dataora'], 11, 5)}}
                                        @else 
                                            {{$uscita = substr($timbrata['dataora'], 11, 5)}}
                                        @endif

                                    @endif
                                @endforeach
                            </td>
                            <td> 
                                @foreach ($timbrate as $timbrata)
                                    @if ($item['id'] == $timbrata['employee_id'] && substr($timbrata['dataora'], 0, 10) == '2020-12-02')

                                        @if ($timbrata['verso'] == 'E')
                                            {{ $entrata = substr($timbrata['dataora'], 11, 5)}}
                                        @else 
                                            {{$uscita = substr($timbrata['dataora'], 11, 5)}}
                                        @endif

                                    @endif
                                @endforeach
                            </td>
                            <td> 
                                @foreach ($timbrate as $timbrata)
                                    @if ($item['id'] == $timbrata['employee_id'] && substr($timbrata['dataora'], 0, 10) == '2020-12-03')

                                        @if ($timbrata['verso'] == 'E')
                                        @php
                                            $differenza = date_diff(date_create(substr($timbrata['dataora'], 11, 5)),date_create('24:00')); 
                                        @endphp

                                        {{$differenza = $differenza->format("%H:%i")}}

                                        @else 
                                            {{$uscita = substr($timbrata['dataora'], 11, 5)}}
                                        @endif
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td> 
                                <?php 
                                    $entrate = []; 
                                    $uscite = [];
                                ?>
                                @foreach ($timbrate as $timbrata)
                                
                                    @if ($item['id'] == $timbrata['employee_id'] && substr($timbrata['dataora'], 0, 10) == '2020-12-04')
                                        
                                        @if ($timbrata['verso'] == 'E')
                                            <?php 
                                                $entrata = substr($timbrata['dataora'], 11, 5);
                                                $entrate[] = $entrata;
                                            ?>
                                        @else 
                                            <?php 
                                                $uscita = substr($timbrata['dataora'], 11, 5);
                                                $uscite[] = $uscita;
                                            ?>
                                        @endif
                                    @endif
                                  
                                @endforeach
                                @for ($i = 0; $i < count($entrate); $i++)
                                    <?php

                                        $differenza = date_diff(date_create($entrate[$i]),date_create($uscite[$i])); 
                                        $differenza = $differenza->format("%H:%i");

                                    ?>
                                    {{$differenza}}
                                @endfor
                                @if (count($entrate) == 0)
                                   
                                    {{$uscite[0]}}
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>
    </body>
</html>

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    div {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    td,
    th {
        margin: 0 5px;
    }
</style>