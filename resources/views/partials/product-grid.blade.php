@foreach ($products as $product)
    <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card h-100 bg-white rounded-4 overflow-hidden position-relative"
            style="border: 1px solid #f1f5f9; transition: box-shadow 0.25s, transform 0.25s;">

            {{-- Badge --}}
            <span class="position-absolute top-0 start-0 m-3 badge"
                style="background:#0f172a; color:#fff; font-size:10px; letter-spacing:1px; border-radius:6px; padding:5px 10px;">
                NEW
            </span>

            {{-- Wishlist --}}
            <button
                class="position-absolute top-0 end-0 m-3 border-0 bg-white rounded-circle d-flex align-items-center justify-content-center wishlist-btn"
                style="width:34px; height:34px; box-shadow:0 2px 8px rgba(0,0,0,0.08); transition: all 0.2s;">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#94a3b8" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>

            {{-- Image --}}
            <div class="product-img-wrap overflow-hidden" style="height:210px; background:#f8fafc;">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}"
                    class="w-100 h-100 product-img" style="object-fit:cover; transition: transform 0.4s ease;">
            </div>

            {{-- Body --}}
            <div class="p-3">
                <p class="mb-1" style="font-size:11px; color:#94a3b8; text-transform:uppercase; letter-spacing:1px;">
                    {{ $product->category->category_name ?? 'Product' }}
                </p>
                <h6 class="fw-bold mb-1 text-truncate" style="color:#0f172a; font-size:0.95rem;">
                    {{ $product->product_name }}
                </h6>
                <p class="text-truncate mb-3" style="font-size:0.82rem; color:#94a3b8;">
                    {{ $product->description }}
                </p>

                <div class="d-flex align-items-center justify-content-between">
                    <span class="fw-bold" style="color:#ef4444; font-size:1rem;">
                        Rs. {{ number_format($product->price, 2) }}
                    </span>
                    <div class="d-flex gap-1" style="font-size:12px; color:#fbbf24;">
                        ★★★★<span style="color:#e2e8f0;">★</span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-3 d-flex gap-2">
                    <a href="#" class="btn flex-fill fw-semibold btnView"
                        style="background:#0f172a; color:#fff; font-size:0.82rem; border-radius:10px; padding:8px 0; transition: background 0.2s;"
                        data-id = "{{ $product->id }}" data-name="{{ $product->product_name }}"
                        data-price="{{ number_format($product->price, 2) }}" data-desc="{{ $product->description }}"
                        data-image="{{ asset('storage/' . $product->product_image) }}">
                        View
                    </a>
                    <button class="btn d-flex align-items-center justify-content-center"
                        style="background:#f1f5f9; border-radius:10px; width:38px; height:38px; padding:0; transition: background 0.2s; flex-shrink:0;">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#475569"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
