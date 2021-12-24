import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/place_controller.dart';
import 'package:vncitizens_home/src/models/place_model.dart';

class Place extends GetView<PlaceController> {
  final _scrollController = ScrollController();
  final String placeName;

  Place({Key? key, required this.placeName}) : super(key: key) {
    _scrollController.addListener(_onScroll);
  }

  void _onScroll() {
    if (_onReachedMax) controller.fetchPlaces();
  }

  bool get _onReachedMax {
    final maxScroll = _scrollController.position.maxScrollExtent;
    final currentScroll = _scrollController.offset;
    return currentScroll >= maxScroll;
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.white,
          leading: IconButton(
            icon: const Icon(
              Icons.arrow_back,
              color: Colors.black,
            ),
            onPressed: () => Navigator.of(context).pop(),
          ),
          title: Text(
            'list_title'.trParams({'name': placeName}),
            style: const TextStyle(color: Colors.black),
          ),
          centerTitle: true,
        ),
        body: ScrollConfiguration(
          behavior: ScrollConfiguration.of(context).copyWith(scrollbars: false),
          child: Obx(
            () => ListView.builder(
              itemBuilder: (BuildContext context, int index) {
                return index >= controller.places.length
                    ? const Center(
                        child: SizedBox(
                          width: 24,
                          height: 24,
                          child: CircularProgressIndicator(),
                        ),
                      )
                    : PlaceItem(place: controller.places[index]);
              },
              itemCount: controller.last
                  ? controller.places.length
                  : controller.places.length + 1,
              controller: _scrollController,
            ),
          ),
        ),
      ),
    );
  }
}

class PlaceItem extends StatelessWidget {
  final PlaceModel place;

  const PlaceItem({Key? key, required this.place}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(left: 10, top: 10, right: 10),
      child: TextButton(
        onPressed: () => {},
        child: ListTile(
          contentPadding: const EdgeInsets.all(10),
          leading: ClipRRect(
            borderRadius: BorderRadius.circular(50),
            child: Image.asset("assets/images/img.jpg"),
          ),
          title: Text(
            place.name,
            style: const TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            overflow: TextOverflow.ellipsis,
          ),
          subtitle: Text(
            place.address,
            maxLines: 2,
            overflow: TextOverflow.ellipsis,
          ),
          trailing: const Icon(Icons.arrow_forward),
        ),
      ),
      decoration: BoxDecoration(
        border: Border.all(),
      ),
    );
  }
}
