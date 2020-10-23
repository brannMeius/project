<?php
require_once 'crest/src/crest.php';
function zakaz()
{
    return CRest::call('crm.deal.list', [
        'select'=> ['*']
    ]);
}
function comparison($contact) {
    $z = zakaz();
    $zakaz = [];
    foreach ($z['result'] as $item) {
        if ($item['CONTACT_ID'] === $contact['result']['ID']) {
            $zakaz[] = " Название: ". $item['TITLE'].
            " Цена: ". $item['OPPORTUNITY']. $item['CURRENCY_ID']. "\n";
        }
    }
    return $zakaz;
}
function result()
{
    return CRest::call('crm.contact.list', [
        'select'=> ['*']
    ]);
}
$t=result();
$result = [];
foreach ($t['result'] as $key => $value) {
    $contact = CRest::call('crm.contact.get', [
        'ID' => $value['ID']
    ]);
    if ($_GET['name'] && $_GET['email']) {
        if ($_GET['name'] === $contact['result']['NAME']) {
            $name = $contact['result']['NAME'];
            foreach ($contact['result']['EMAIL'] as $email) {
                if ($_GET['email'] === $email['VALUE']) {
                    $result[$key][] = "ID: " . $contact['result']['ID'] .
                        "Name: " . $contact['result']['NAME'] .
                        "Email:" . $email['VALUE'];
                    $result[$key][] = comparison($contact);
                    //$deals = comparison($contact);
                    // var_dump($deals);
                }
            }
        }
    } elseif (!$_GET['name'] && $_GET['email']) {
        foreach ($contact['result']['EMAIL'] as $email) {
            if ($_GET['email'] === $email['VALUE']) {
                $result[$key][] = "ID: " . $contact['result']['ID'] .
                    "Name: " . $contact['result']['NAME'] .
                    "Email:" . $email['VALUE'];
                $result[$key][] = comparison($contact);
                //$deals = comparison($contact);
                //var_dump($deals);
            }
        }
    } elseif ($_GET['name'] && !$_GET['email']) {
        if ($_GET['name'] === $contact['result']['NAME']) {
            $name = $contact['result']['NAME'];
            foreach ($contact['result']['EMAIL'] as $email) {
                $result[$key][] = "\n" . "ID: " . $contact['result']['ID'] .
                    " Name: " . $contact['result']['NAME'] .
                    " Email: " . $email['VALUE'] . "\n ";
                $result[$key][] = comparison($contact);
                //$deals = comparison($contact);
                //var_dump($deals);
            }
        }
    }
    //echo 'rr0';
    //var_dump($number);
    /*if(!empty($deals)) {
        //var_dump($deals);
        $number = true;
        foreach ($deals as $array) {
            $zakaz[] = " Название: ". $array['TITLE'].
                " Цена: ". $array['OPPORTUNITY']. $array['CURRENCY_ID']. "\n";
            //var_dump($zakaz);
        }
    } else $number=false;
     //   var_dump($number);
    }*/
}
?>

<head>
    <header("Content-Type: text/plain; charset=utf-8")/>
    <TITLE>Поздравляем, сайт создан!</TITLE>
</head>
<body>
<div>
        <?php
            foreach ($result as $xz) {
                    foreach ($xz as $res) {
                        if (gettype($res) === 'array') {
                            foreach ($res as $r) {
                                echo $r; ?><br> <?php
                            }
                        } else {
                            echo $res;?><br> <?php
                        }
                    }
            }
        ?>
    <br>
    <form action="index.php" method="get">
        <button type="submit">Назад</button>
    </form>
</div>
</body>