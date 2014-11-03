
<?php
    
//Gets all products. Produces search/sort bar to search and sort through them.
//Stores the search results in order in the array $result.

$products = array();
$result = array();
$searchtext = "";
$displaytext = "";

if (!isset($QryStr)) $QryStr = "SELECT * FROM Products";

$Results = mysqli_query($mysqli, $QryStr) or
    die("Failed Query $QryStr: " . mysqli_error($mysqli));

while ($Obj = mysqli_fetch_object($Results)){
        array_push($products, $Obj);
}
$result = $products;

if(isset($_GET['search']))
{
    $search = $_GET['search'];
    if($search == "" || ctype_space ($search)){
        unset($search);
    }
    else{
        $searchtext = $search;
        search();
    }
}

if(isset($_GET['displaymode']))
{
    $displaymode = $_GET['displaymode'];
    $displaytext = $displaymode;
    fixMode();

} else {
    $displaymode = "standard";
}

// Sort works by sorting all products into a certain order before the result array is displayed.
function fixMode(){
    global $result;
    global $products;
    global $displaymode;
    if (strcmp ( $displaymode , "standard" ) == 0){
        
    }else if(strcmp ( $displaymode , "alphabetical" ) == 0){
        $result = sortArrayofObjectByProperty( $result, "name" );
    }else if(strcmp ( $displaymode , "reversedalphabetical" ) == 0){
        $result = array_reverse (sortArrayofObjectByProperty( $result, "name" ));
    }else if(strcmp ( $displaymode , "price" ) == 0){
        $result = sortArrayofObjectByProperty( $result, "price" );
    }else if(strcmp ( $displaymode , "weight" ) == 0){
        $result = sortArrayofObjectByProperty( $result, "weight" );
    }else{
        unset($displaymode);
    }
}

// Search displays all results with names containing the search string.
function search(){
    global $result;
    global $products;
    $result = array();
    global $search;
    $i=0;
    foreach($products as $Object){
        //Find all occurances of the search string in our product database. 
        if(strpos(strtolower ($Object->name), strtolower($search)) !== FALSE){
            array_push($result, $Object);
            $i++;
        }
    }
    echo "Search returned <B>$i</B> results.<BR>";
}

//Display the search form.
$sortoptions = array(
    "standard" => "Mysterious",
    "alphabetical" => "Alphabetical (A-Z)",
    "reversedalphabetical" => "Alphabetical (Z-A)",
    "price" => "Price",
    "weight" => "Weight"
);

echo "<BR><form id = 'searcher' action='' method='get'><fieldset>
        <label for='searchbar'>Search:</label>
        <input type='text' name='search' id='searchbar' class ='text ui-widget-content ui-corner-all' maxlength='40' value='" . $searchtext . "'>
        <label for='displaymode'>Sort by:</label>
        <select name='displaymode' id='displaymode' class='text ui-widget-content ui-corner-all'>";

foreach( $sortoptions as $var => $interest ){
    $isselected = "";
    if(strcmp ( $var , $displaytext ) == 0){
        $isselected = "selected = 'selected'";
    }
    echo "<option value = '$var' $isselected> $interest </option>";
}

echo " </select>
    <button class ='text ui-widget-content ui-corner-all' >Go!</button>
    </fieldset></form> ";

/**
* Sort one array of objects by one of the object's property
*
* @param mixed $array, the array of objects
* @param mixed $property, the property to sort with
* @return mixed, the sorted $array
* by http://www.mabishu.com/blog/2011/02/03/sort-an-array-of-objects-by-one-of-the-object-property-with-php/
*/
function sortArrayofObjectByProperty( $array, $property )
{
    $cur = 1;
    $stack[1]['l'] = 0;
    $stack[1]['r'] = count($array)-1;

    do
    {
        $l = $stack[$cur]['l'];
        $r = $stack[$cur]['r'];
        $cur--;

        do
        {
            $i = $l;
            $j = $r;
            $tmp = $array[(int)( ($l+$r)/2 )];

            // split the array in to parts
            // first: objects with "smaller" property $property
            // second: objects with "bigger" property $property
            do
            {
                while( $array[$i]->{$property} < $tmp->{$property} ) $i++;
                while( $tmp->{$property} < $array[$j]->{$property} ) $j--;

                // Swap elements of two parts if necesary
                if( $i <= $j)
                {
                    $w = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $w;

                    $i++;
                    $j--;
                }

            } while ( $i <= $j );

            if( $i < $r ) {
                $cur++;
                $stack[$cur]['l'] = $i;
                $stack[$cur]['r'] = $r;
            }
            $r = $j;

        } while ( $l < $r );

    } while ( $cur != 0 );

    return $array;

}
?>
