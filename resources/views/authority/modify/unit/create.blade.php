<form action="" method="POST">
  {{ csrf_field() }}
  <td><!---->
    Auto
  </td>

  <td><!--單位名稱-->
    <input type="text" name="name" autofocus>
  </td>

  <td><!--隸屬單位-->
    <select class="form-control" name="unit_base_id">
      @foreach ($general->lists as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
