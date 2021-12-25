import 'package:flutter/material.dart';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';

List<String> listImage = [];
List<Widget> listImageSlider = [];

class MyBanner extends StatefulWidget implements PreferredSizeWidget {
  @override
  final Size preferredSize; // default is 56.0

  const MyBanner({Key? key})
      : preferredSize = const Size.fromHeight(kToolbarHeight),
        super(key: key);

  @override
  _MyBannerState createState() => _MyBannerState();
}

class _MyBannerState extends State<MyBanner> {
  int _current = 0;
  final CarouselController _controller = CarouselController();

  @override
  Widget build(BuildContext context) {
    final ConfigurationController configurationController = Get.find();
    final config = configurationController.configuration;
    listImage = List.from(config['homeBanner']);
    listImageSlider = listImage
        .map((item) => ClipRRect(
              child: Stack(
                children: <Widget>[
                  ClipPath(
                    clipper: MyWaveClipper(),
                    child: Container(
                      decoration: BoxDecoration(
                        image: DecorationImage(
                          fit: BoxFit.fill,
                          image: NetworkImage(item),
                        ),
                      ),
                    ),
                  )
                ],
              ),
            ))
        .toList();

    return Scaffold(
      body: Builder(
        builder: (context) {
          return Stack(
            alignment: Alignment.center,
            children: [
              CarouselSlider(
                items: listImageSlider,
                carouselController: _controller,
                options: CarouselOptions(
                  height: MediaQuery.of(context).size.height,
                  viewportFraction: 1.0,
                  enlargeCenterPage: false,
                  autoPlay: true,
                  autoPlayInterval: const Duration(seconds: 15),
                  onPageChanged: (index, reason) {
                    setState(() {
                      _current = index;
                    });
                  },
                ),
              ),
              Positioned(
                top: 100,
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: listImage.asMap().entries.map((entry) {
                    return GestureDetector(
                      onTap: () => _controller.animateToPage(entry.key),
                      child: Container(
                        width: 12.0,
                        height: 12.0,
                        margin: const EdgeInsets.symmetric(
                            vertical: 8.0, horizontal: 4.0),
                        decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.white.withOpacity(
                                _current == entry.key ? 0.9 : 0.4)),
                      ),
                    );
                  }).toList(),
                ),
              ),
              const Positioned(
                top: 150,
                left: 10,
                child: Text(
                  "Tiền Giang",
                  style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                ),
              ),
            ],
          );
        },
      ),
    );
  }
}

class MyWaveClipper extends CustomClipper<Path> {
  @override
  Path getClip(Size size) {
    var path = Path();

    path.lineTo(0.0, size.height - 40);

    path.quadraticBezierTo(size.width / 8, size.height - 50,
        (size.width / 8) * 2, size.height - 50);

    path.quadraticBezierTo((size.width / 8) * 3, size.height - 50,
        (size.width / 8) * 4, size.height - 40);

    path.quadraticBezierTo((size.width / 8) * 5, size.height - 30,
        (size.width / 8) * 6, size.height - 30);

    path.quadraticBezierTo((size.width / 8) * 7, size.height - 30,
        (size.width / 8) * 8, size.height - 40);

    path.lineTo(size.width, 0.0);

    return path;
  }

  @override
  bool shouldReclip(covariant CustomClipper<Path> oldClipper) => false;
}
