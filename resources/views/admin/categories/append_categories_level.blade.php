<div class="form-row">
	<div class="form-group col-md-8">
		<div class=" col-md-8 ">
			<label for="parent_id">Category</label>
			<select name="parent_id" id="parent_id" class="custom-select">
				<option value="0" @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==0) selected="" @endif>Main Category</option>
				@if(!empty($getCategories))
					@foreach($getCategories as $category)
						<option value="{{$category['id']}}" @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==$category['id']) selected="" @endif>{{$category['category_name']}}</option>
						@if(!empty($category['subcategories']))
							@foreach($category['subcategories'] as $subcategory)
								<option value="{{$subcategory['id']}}">&nbsp;&raquo;&nbsp;{{$subcategory['category_name']}}</option>
							@endforeach
						@endif
					@endforeach
				@endif
			</select>
		</div>
	</div>
</div>