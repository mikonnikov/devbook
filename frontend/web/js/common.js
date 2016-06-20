/**
 * Hide/show quick search form
 */
function toggleSearch(extSearch) {
    if(extSearch==1) {
        $('#extSearch').show();
        $('#quickSearch').hide();
    } else {
        $('#extSearch').hide();
        $('#quickSearch').show();
    }
}
