@section('title', 'Pricing')
<x-user-layout>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4">
            <div class="pricing">
                <div class="pricing-title">
                    Free
                </div>
                <div class="pricing-padding">
                    <div class="pricing-price">
                        <div>0 Rp</div>
                        <div>Lifetime</div>
                    </div>
                    <div class="pricing-details">
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">100 Request/Day</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                            <div class="pricing-item-label">24/7 Support</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                            <div class="pricing-item-label">Custom Api Key</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                            <div class="pricing-item-label">Premium / Vip Feature</div>
                        </div>
                    </div>
                </div>
                <div class="pricing-cta">
                    @if (Auth::check())
                        @if (Auth()->user()->status == 'Free')
                            <a href="#">Current Plan</a>
                        @else
                            <a href="https://wa.me/6285156592604">Buy <i class="fas fa-arrow-right"></i></a>
                        @endif
                    @else
                        <a href="#">Login First </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="pricing pricing-highlight">
                <div class="pricing-title">
                    Premium
                </div>
                <div class="pricing-padding">
                    <div class="pricing-price">
                        <div>15k Rp</div>
                        <div>Per Month</div>
                    </div>
                    <div class="pricing-details">
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">10000 Request/Day</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">24/7 Support</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Custom Api Key</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Premium Features</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                            <div class="pricing-item-label">Vip Features</div>
                        </div>
                    </div>
                </div>
                <div class="pricing-cta">
                    @if (Auth::check())
                        @if (Auth()->user()->status == 'Premium')
                            <a href="#">Current Plan</a>
                        @else
                            <a href="https://wa.me/6285156592604">Buy <i class="fas fa-arrow-right"></i></a>
                        @endif
                    @else
                        <a href="#">Login First </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="pricing">
                <div class="pricing-title">
                    Vip
                </div>
                <div class="pricing-padding">
                    <div class="pricing-price">
                        <div>40k Rp</div>
                        <div>Per Month</div>
                    </div>
                    <div class="pricing-details">
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Unlimited Request / Day</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">24/7 Support</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Custom Api Key</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Premium Features</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Vip Features</div>
                        </div>
                    </div>
                </div>
                <div class="pricing-cta">
                    @if (Auth::check())
                        @if (Auth()->user()->status == 'Vip')
                            <a href="#">Current Plan </a>
                        @else
                            <a href="https://wa.me/6285156592604">Buy <i class="fas fa-arrow-right"></i></a>
                        @endif
                    @else
                        <a href="#">Login First </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-user-layout>
