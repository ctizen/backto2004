<?php
require_once __DIR__ . '/commonTemplate.php';

function editEntityForm($data) {
    return commonTemplate(<<<FORM
<h2>Edit merchandise</h2>
<form action="" method="post">
    <input type="hidden" name="data[id]" value="${data['id']}" />
    <table>
        <tr>
            <td><label for="title">Title*</label></td>
            <td><input id="title" type="text" name="data[title]" value="${data['title']}" /></td>
        </tr>
        <tr>
            <td><label for="cost">Cost*</label></td>
            <td><input id="cost" type="text" name="data[cost]" value="${data['cost']}" /></td>
        </tr>
        <tr>
            <td><label for="description">Description</label></td>
            <td><textarea id="description" name="data[description]">${data['description']}</textarea></td>
        </tr>
        <tr>
            <td><label for="img">Image URL</label></td>
            <td><input id="img" type="text" name="data[img]" value="${data['img']}" /></td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="Update merchandise"></td></tr>
    </table>
</form>
FORM
);
}
