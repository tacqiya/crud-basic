public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request) {
        $product = new Product;
        $product->productname = $request->productname;
        $product->categories = $request->categories;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products')->with('status', 'Product Added Successfully');
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->back()->with('status', 'Product Updated Successfully');
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('status', 'Product Deleted Successfully');
    }