import 'dart:convert';

import 'package:get/get.dart';
import 'package:vncitizens_authentication/vncitizens_authentication.dart';
import 'package:vncitizens_home/src/models/place_model.dart';
import 'package:http/http.dart' as http;

const size = 10;
const svcPlacePf = 'pl/place';

class PlaceService {
  final String apiGatewayURL;

  PlaceService({required this.apiGatewayURL});

  Future<List<PlaceModel>> fetchPlace(
      {required String placeTagId, required int page}) async {
    final AuthenticationController authenticationController = Get.find();
    final accessToken = authenticationController.accessToken;

    final response = await http.get(
      Uri.parse(
          '$apiGatewayURL/$svcPlacePf/--search?tag-id=$placeTagId&page=$page&size=$size'),
      headers: {'Authorization': 'Bearer $accessToken'},
    );
    if (response.statusCode == 200) {
      final body =
          json.decode(utf8.decode(response.bodyBytes))['content'] as List;

      return body.map((dynamic json) {
        return PlaceModel(
          id: json['id'] ?? '',
          name: json['name'] ?? '',
          icon: json['thumbnail'] ?? '',
          latitude: json['location']['latitude'] ?? 0,
          longitude: json['location']['longitude'] ?? 0,
          phoneNumber: json['phoneNumber'] ?? '',
          address: json['baPlace']['address'] ?? '',
        );
      }).toList();
    }
    throw Exception(response.body);
  }
}
