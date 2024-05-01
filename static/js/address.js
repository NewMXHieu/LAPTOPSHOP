
$(document).ready(function() {
    $('select[name="calc_shipping_provinces"]').change(function() {
        var province_id = $(this).val();

        $.ajax({
            url: '/laptopshop/config/fetch_district.php',
            method: 'POST',
            data: { province_id: province_id },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // Clear the district select box
                $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>');
            
                // Check if there was an error
                if (data.error) {
                } else {
                    $.each(data, function(index, district) {
                        $('select[name="calc_shipping_district"]').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                console.log(jqXHR.responseText)
            }
        });
    });
});